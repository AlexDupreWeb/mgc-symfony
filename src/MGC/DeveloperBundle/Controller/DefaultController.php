<?php

namespace MGC\DeveloperBundle\Controller;

use MGC\CoreBundle\Controller\MGCController;
use MGC\DeveloperBundle\Utils\DeveloperThumbnail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends MGCController
{
    /**
     * @Route("/developer", name="developer")
     */
    public function indexAction()
    {

        $developer_thumbnails = array(
            new DeveloperThumbnail('OpenStreetMap','How to use it?','','/openstreetmap/img/logo-osm.svg',$this->getUrlFromRoute('developer-osm'), DeveloperThumbnail::PICTURE_TYPE_IMAGE),
            new DeveloperThumbnail('CKEditor','Wysiwyg editor','fa fa-pencil-square-o','',$this->getUrlFromRoute('developer-ckeditor')),
            new DeveloperThumbnail('CKFinder','File manager','fa fa-upload','',$this->getUrlFromRoute('developer-ckfinder')),
        );
        return $this->render('DeveloperBundle:Default:index.html.twig', [
            'developer_thumbnails' => $developer_thumbnails,
        ]);
    }

    /**
     * @Route("/developer/openstreetmap", name="developer-osm")
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

    /**
     * @Route("/developer/ckeditor", name="developer-ckeditor")
     */
    public function ckeditorAction()
    {
        return $this->render('DeveloperBundle:Default:ckeditor.html.twig');
    }

    /**
     * @Route("/developer/ckfinder", name="developer-ckfinder")
     */
    public function ckfinderAction()
    {
        return $this->render('DeveloperBundle:Default:ckfinder.html.twig');
    }
}
