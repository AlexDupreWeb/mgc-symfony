<?php

namespace MGC\AdminBundle\Controller;

use MGC\CoreBundle\Controller\MGCController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends MGCController
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        //return $this->redirectToRoute('login');
        return $this->redirectToRoute('home');
    }
}
