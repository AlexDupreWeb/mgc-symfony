<?php

namespace MGC\TimeTrackingBundle\Services;

use Doctrine\ORM\EntityManager;
use MGC\TimeTrackingBundle\Repository\TaskRepository;

class TaskService {

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var TaskRepository
     */
    private $taskRepository;

    public function __construct(EntityManager $entityManager) {
        $this->em = $entityManager;
        $this->taskRepository = $entityManager->getRepository('TimeTrackingBundle:Task');
    }

}