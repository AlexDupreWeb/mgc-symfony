<?php

namespace MGC\DeveloperBundle\Controller;

use MGC\CoreBundle\Controller\MGCController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends MGCController
{
    /**
     * @Route("/developer/")
     */
    public function indexAction()
    {
        return $this->render('DeveloperBundle:Default:index.html.twig');
    }

    /**
     * @Route("/developer/openstreetmap", name="dev-osm")
     */
    public function openStreetMapAction()
    {
        $array = array(
            array('lat' => '49.4431','long' => '1.0993','text' => '<b>Test</b><br>Rouen'),
            array('lat' => '49.421235','long' => '1.075605','text' => 'Test'),
            array('lat' => '49.52758','long' => '1.03924','text' => ''),
        );
        //echo json_encode($array);die();

        return $this->render('DeveloperBundle:Default:openstreetmap.html.twig');
    }
}
