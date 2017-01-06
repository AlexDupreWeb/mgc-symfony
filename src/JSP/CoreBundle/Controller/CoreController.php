<?php

namespace JSP\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CoreController extends Controller
{
    /**
     * @Route("/jsp2/")
     */
    public function indexAction()
    {
        return $this->render('JspCoreBundle:Default:index.html.twig');
    }
}
