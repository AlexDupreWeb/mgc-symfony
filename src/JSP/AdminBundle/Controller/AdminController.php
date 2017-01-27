<?php

namespace JSP\AdminBundle\Controller;

use MGC\CoreBundle\Controller\MGCController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends MGCController {

    /**
     * @Route("/jsp/", name="jsp_home")
     */
    public function indexAction()
    {
        return $this->render('JspAdminBundle:Admin:index.html.twig');
    }

}
