<?php

namespace MGC\TimeTrackingBundle\Controller;

use MGC\CoreBundle\Controller\MGCController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends MGCController
{
    /**
     * @Route("/time-tracking")
     */
    public function indexAction()
    {
        return $this->render('TimeTrackingBundle:Default:index.html.twig');
    }
}
