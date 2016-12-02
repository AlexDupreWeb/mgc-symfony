<?php

namespace MGC\TodoBundle\Controller;

use MGC\CoreBundle\Controller\MGCController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TodoController extends MGCController
{
    /**
     * @Route("/todo")
     */
    public function indexAction()
    {
        if(!is_null($this->redirect)){ return $this->redirect; }

        return $this->render('TodoBundle:Todo:index.html.twig');
    }
}
