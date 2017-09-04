<?php

namespace MGC\TimeTrackingBundle\Controller;

use MGC\CoreBundle\Controller\MGCController;
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

}
