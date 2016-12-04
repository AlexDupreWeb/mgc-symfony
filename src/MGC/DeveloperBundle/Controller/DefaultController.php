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
        if(!is_null($this->redirect)){ return $this->redirect; }

        $developer_thumbnails = array(
            new DeveloperThumbnail('OpenStreetMap','How to use it?','','/openstreetmap/img/logo-osm.svg',$this->getUrlFromRoute('developer-osm'), DeveloperThumbnail::PICTURE_TYPE_IMAGE),
            new DeveloperThumbnail('CKEditor','Wysiwyg editor','fa fa-pencil-square-o','',$this->getUrlFromRoute('developer-ckeditor')),
            new DeveloperThumbnail('Responsive File Manager','File manager','fa fa-upload','',$this->getUrlFromRoute('developer-responsivefilemanager')),
        );
        return $this->render('DeveloperBundle:Default:index.html.twig', array(
            'developer_thumbnails' => $developer_thumbnails,
        ));
    }

    /**
     * @Route("/developer/openstreetmap", name="developer-osm")
     */
    public function openStreetMapAction()
    {
        if(!is_null($this->redirect)){ return $this->redirect; }

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
        if(!is_null($this->redirect)){ return $this->redirect; }

        return $this->render('DeveloperBundle:Default:ckeditor.html.twig');
    }

    /**
     * @Route("/developer/responsivefilemanager", name="developer-responsivefilemanager")
     */
    public function responsivefilemanagerAction()
    {
        if(!is_null($this->redirect)){ return $this->redirect; }
        
        $params_for_input_filemanager = array(
            array( 'lang' => 'fr_FR', 'field_id' => 'rfm1', 'type' => 0, 'label_comment' => 'all' ),
            array( 'lang' => 'fr_FR', 'field_id' => 'rfm2', 'type' => 1, 'label_comment' => 'image' ),
            array( 'lang' => 'fr_FR', 'field_id' => 'rfm3', 'type' => 3, 'label_comment' => 'video' ),
            array( 'lang' => 'fr_FR', 'field_id' => 'rfm4', 'type' => 2, 'label_comment' => 'file' ),
        );

        return $this->render('DeveloperBundle:Default:responsivefilemanager.html.twig', array(
            'params_for_input_filemanager' => $params_for_input_filemanager
        ));
    }
}
