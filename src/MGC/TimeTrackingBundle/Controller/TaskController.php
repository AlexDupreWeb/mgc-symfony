<?php

namespace MGC\TimeTrackingBundle\Controller;

use MGC\CoreBundle\Controller\MGCController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TaskController extends MGCController {

    /**
     * @Route("/time-tracking/tasks/add")
     */
    public function addAction() {


        return $this->render('TimeTrackingBundle:Default:index.html.twig', [

        ]);
    }

}