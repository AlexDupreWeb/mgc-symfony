<?php

namespace MGC\TimeTrackingBundle\Controller;

use MGC\CoreBundle\Controller\MGCController;
use MGC\CoreBundle\Utils\Pagination;
use MGC\CoreBundle\Utils\PaginationCleaner;
use MGC\TimeTrackingBundle\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends MGCController {

    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null) {
        parent::setContainer($container);
        $this->taskRepository = $this->getDoctrine()->getRepository('TimeTrackingBundle:Task');
    }

    /**
     * @Route("/time-tracking/tasks", name="time-tracking-tasks")
     */
    public function indexAction(Request $request) {

        $limit = 25;

        $currentPage = !empty($request->query->get('p')) ? $request->query->get('p'):1;
        $offset = ($currentPage - 1) * $limit;

        $tasks = $this->getDoctrine()->getRepository('TimeTrackingBundle:Task')->findBy([], ['date' => 'desc'], $limit, $offset);
        $nbTasks = $this->getDoctrine()->getRepository('TimeTrackingBundle:Task')->countAll();

        $request->query->remove('p');

        $numberPages = ceil($nbTasks/$limit);
        $currentUrl = PaginationCleaner::getCurrentUrl($request->getUri());
        $currentParams = PaginationCleaner::getCurrentParams($request->query->all());

        $pagination = new Pagination($currentUrl);
        $pagination->setCurrentPage($currentPage);
        $pagination->setParamsUrl($currentParams);
        $pagination->setParamPageUrl('p');
        $pagination->setNumberPages($numberPages);

        return $this->render('TimeTrackingBundle:Task:index.html.twig', [
            'tasks' => $tasks,
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/time-tracking/tasks/add", name="time_tracking_tasks_add")
     */
    public function addAction() {

        return $this->render('TimeTrackingBundle:Task:add.html.twig', [

        ]);
    }

    /**
     * @Route("/time-tracking/tasks/edit/{id}", requirements={"id": "\d+"}, name="time_tracking_tasks_edit")
     */
    public function editAction($id) {
        //$task = $this->taskRepository->find($id);
        $task = null;

        $form = $this->createFormBuilder($task)
            ->add('name', TextType::class, array('label' => 'BLAAAA'))
            ->add('date', TextType::class, array('label' => 'BLAAAA'))
            ->add('executionTime', TextType::class, array('label' => 'BLAAAA'))
            ->add('comment', TextareaType::class, array('label' => 'BLAAAA'))

            ->add('save', SubmitType::class, array('label' => "Create element"))
            ->getForm();

        return $this->render('TimeTrackingBundle:Task:edit.html.twig', [
            'task' => $task,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/time-tracking/tasks/delete/{id}", requirements={"id": "\d+"}, name="time_tracking_tasks_delete")
     */
    public function deleteAction($id) {

        dump($id);

        die;
    }

}