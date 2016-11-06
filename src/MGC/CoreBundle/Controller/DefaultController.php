<?php

namespace MGC\CoreBundle\Controller;

use MGC\CoreBundle\Utils\HomeThumbnail;
use MGC\CoreBundle\Utils\HomeWidget;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends MGCController
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        if(!is_null($this->redirect)){ return $this->redirect; }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function homeAction(Request $request)
    {
        if(!is_null($this->redirect)){ return $this->redirect; }

        $request->setLocale('en');
        $request->setLocale('fr');

        $testeuh = $this->get('translator')->trans('mgc.global.sign_out', array(), 'messages', $request->getLocale());
        //dump($testeuh);die();

        $home_thumbnails = array(
            new HomeThumbnail('Folder', 'fa fa-folder', '', '#'),

            new HomeThumbnail('Terminal', 'fa fa-terminal', $this->getIcon('terminal'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),
            new HomeThumbnail('Folder', 'fa fa-folder', $this->getIcon('folder'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),
            new HomeThumbnail('Settings', 'fa fa-cogs', $this->getIcon('cog'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),

            new HomeThumbnail('Note', '', $this->getIcon('note'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),
            new HomeThumbnail('Help', '', $this->getIcon('help'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),
            new HomeThumbnail('Contacts', '', $this->getIcon('addressbook'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),

            new HomeThumbnail('Wiki', '', $this->getIcon('wiki'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),
            new HomeThumbnail('Diagram', '', $this->getIcon('diagram'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),
            new HomeThumbnail('Sketchbook', '', $this->getIcon('sketchbook'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),

            new HomeThumbnail('Dropbox', '', $this->getIcon('dropbox'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),
            new HomeThumbnail('Google Drive', '', $this->getIcon('googledrive'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),
            new HomeThumbnail('Cursor', '', $this->getIcon('cursor'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),

            new HomeThumbnail('Geolocation', '', $this->getIcon('geolocation'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),
            new HomeThumbnail('Picture', '', $this->getIcon('picture'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),
            new HomeThumbnail('Toggles', '', $this->getIcon('toggles'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),

            new HomeThumbnail('Dictionary', '', $this->getIcon('dictionary'), '#', HomeThumbnail::PICTURE_TYPE_IMAGE),
        );

        $home_widgets = array(
            new HomeWidget(120, "Nouveau", "fa fa-plus", "Plus", "fa fa-arrow-circle-right", "bg-green"),
            new HomeWidget(130, "Nouveau", "fa fa-plus", "Plus", "fa fa-arrow-circle-right", "bg-orange"),
            new HomeWidget(140, "Nouveau", "fa fa-plus", "Plus", "fa fa-arrow-circle-right", "bg-red"),
            new HomeWidget(150, "Nouveau", "fa fa-plus", "Plus", "fa fa-arrow-circle-right", "bg-blue")
        );

        // replace this example code with whatever you need
        return $this->render('default/home.html.twig', array(
            'home_thumbnails' => $home_thumbnails,
            'home_widgets' => $home_widgets
        ));
    }

    /**
     * @Route("/profile", name="profile")
     *
     * @param Request $request
     * @return Response
     */
    public function profileAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/profile.html.twig', []);
    }

    /**
     * @Route("/settings", name="settings")
     *
     * @param Request $request
     * @return Response
     */
    public function settingsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/settings.html.twig', []);
    }

    /**
     * @Route("/faq", name="faq")
     *
     * @param Request $request
     * @return Response
     */
    public function faqAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/faq.html.twig', []);
    }
}
