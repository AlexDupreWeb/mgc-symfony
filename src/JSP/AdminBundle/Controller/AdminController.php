<?php

namespace JSP\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends Controller
{
    /**
     * @Route("/jsp/")
     */
    public function indexAction()
    {
        return $this->render('JspAdminBundle:Default:index.html.twig');
    }
}
