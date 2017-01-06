<?php

namespace MGC\AdminBundle\Controller;

use MGC\CoreBundle\Controller\MGCController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class TestController extends MGCController
{
    /**
     * @Route("/test/permissions")
     */
    public function testPermissionAction()
    {
        if(!is_null($this->redirect)){ return $this->redirect; }

        $test = $this->permissionService->loadBundlePermissions();
        dump($test);

        die;
        // replace this example code with whatever you need
        //return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/test/route")
     */
    public function testRouteAction(Request $request)
    {

        dump($request);

        die;
        // replace this example code with whatever you need
        //return $this->render('default/index.html.twig');
    }
}
