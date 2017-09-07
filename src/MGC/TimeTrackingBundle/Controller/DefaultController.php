<?php

namespace MGC\TimeTrackingBundle\Controller;

use JMS\Serializer\Serializer;
use MGC\CoreBundle\Controller\MGCController;
use MGC\TimeTrackingBundle\Dto\FullCalendar\Calendar;
use MGC\TimeTrackingBundle\Dto\FullCalendar\Event;
use MGC\TimeTrackingBundle\Services\FullCalendar\EventService;
use MGC\TimeTrackingBundle\Services\Mappers\FullCalendar\EventMapper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends MGCController {

    /**
     * @Route("/time-tracking")
     */
    public function indexAction() {

        $projects = $this->getDoctrine()->getRepository('TimeTrackingBundle:Project')->findAll();
        $tasks = $this->getDoctrine()->getRepository('TimeTrackingBundle:Task')
            ->findBy([], ['date' => 'desc']);


        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQueryBuilder();

        $query
            ->select('t.date')
            ->addSelect('SUM(t.executionTime) executionTime')
            ->from('TimeTrackingBundle:Task', 't')
            ->groupBy('t.date')
            ->orderBy('t.date', 'DESC')
            //->setMaxResults( $limit )
        ;
        $daily_report = $query->getQuery()->getArrayResult();

        for ($i = 0; $i < count($daily_report); $i++) {
            if($daily_report[$i]['executionTime'] >= (7*60)) {
                $daily_report[$i]['color'] = 'green';
            }elseif($daily_report[$i]['executionTime'] < (7*60) && $daily_report[$i]['executionTime'] >= (4*60)) {
                $daily_report[$i]['color'] = 'yellow';
            }else{
                $daily_report[$i]['color'] = 'red';
            }
        }

        return $this->render('TimeTrackingBundle:Default:index.html.twig', [
            'projects' => $projects,
            'tasks' => $tasks,
            'daily_report' => $daily_report,
        ]);

    }

    /**
     * @Route("/time-tracking/calendar", name="time-tracking-calendar")
     */
    public function calendarAction() {
        /**
         * @var EventService $eventService
         */
        $eventService = $this->get('time_tracking.service.full_calendar.event');

        /**
         * @var EventMapper $eventMapper
         */
        $eventMapper = $this->get('time_tracking.mapper.full_calendar.event');

        $event = new Event();
        $event
            ->setTitle('test')
            ->setStart(new \DateTime());

        $tasks = $this->getDoctrine()->getRepository('TimeTrackingBundle:Task')
            ->findBy([], ['date' => 'desc']);

        $array = [];
        foreach ($tasks as $task) {
            $array[] = $eventMapper->entityToDto($task);
        }

        $calendar = new Calendar();
        $calendar
            ->setHeader([
                Calendar::HEADER_POSITION_LEFT => Calendar::HEADER_BTN_PREV .','. Calendar::HEADER_BTN_TODAY .','. Calendar::HEADER_BTN_NEXT,
                Calendar::HEADER_POSITION_CENTER => Calendar::HEADER_TEXT_TITLE,
                Calendar::HEADER_POSITION_RIGHT => Calendar::HEADER_BTN_MONTH .','. Calendar::HEADER_BTN_WEEK .','. Calendar::HEADER_BTN_DAY
            ])
            ->setButtonText([
                Calendar::BUTTON_TEXT_DAY => 'Jour',
                Calendar::BUTTON_TEXT_LIST => 'Liste',
                Calendar::BUTTON_TEXT_MONTH => 'Mois',
                Calendar::BUTTON_TEXT_TODAY => "Aujourd'hui",
                Calendar::BUTTON_TEXT_WEEK => 'Semaine',
                Calendar::BUTTON_TEXT_NEXT => '>',
                Calendar::BUTTON_TEXT_NEXTYEAR => '>>',
                Calendar::BUTTON_TEXT_PREV => '<',
                Calendar::BUTTON_TEXT_PREVYEAR => '<<'
            ])
            ->setBootstrapGlyphicons([
                Calendar::BOOTSTRAP_GLYPHICONS_CLOSE => 'glyphicon-remove',
                Calendar::BOOTSTRAP_GLYPHICONS_NEXT => 'fa fa-chevron-left',
                Calendar::BOOTSTRAP_GLYPHICONS_NEXTYEAR => 'fa fa-chevron-right',
                Calendar::BOOTSTRAP_GLYPHICONS_PREV => 'glyphicon-backward',
                Calendar::BOOTSTRAP_GLYPHICONS_PREVYEAR => 'glyphicon-forward'
            ])
            ->setDefaultDate(new \DateTime())
            ->setNavLinks(true)
            ->setEditable(false)
            ->setEventLimit(true)
            ->setWeekNumbers(true)
            ->setLocale('fr')
            ->setTheme('bootstrap3')
            ->setEvents($array);

        $json = $eventService->serializeToJson($calendar);

        return $this->render('TimeTrackingBundle:Default:calendar.html.twig', [
            'json' => $json
        ]);
    }

}
