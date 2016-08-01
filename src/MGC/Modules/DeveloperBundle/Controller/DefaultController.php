<?php

namespace MGC\Modules\DeveloperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/mod-developer/")
     */
    public function indexAction()
    {
        return $this->render('DeveloperBundle:Default:index.html.twig');
    }
}
