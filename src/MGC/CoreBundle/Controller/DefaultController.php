<?php

namespace MGC\CoreBundle\Controller;

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
        $request->setLocale('en');
        $request->setLocale('fr');

        $home_shortcuts = array(
            array(
                'title' => 'Dossier',
                'icon' => $this->getIcon('folder'),
                'link' => '#',
            ),
            array(
                'title' => 'Settings',
                'icon' => $this->getIcon('cog'),
                'link' => '#',
            ),

            array(
                'title' => 'Developer',
                'icon' => $this->getIcon('terminal'),
                'link' => '#',
            ),
            array(
                'title' => 'Note',
                'icon' => $this->getIcon('note'),
                'link' => '#',
            ),
            array(
                'title' => 'Help',
                'icon' => $this->getIcon('help'),
                'link' => '#',
            ),
            array(
                'title' => 'Dictionary',
                'icon' => $this->getIcon('dictionary'),
                'link' => '#',
            ),
            array(
                'title' => 'Contacts',
                'icon' => $this->getIcon('addressbook'),
                'link' => '#',
            ),
            array(
                'title' => 'Wiki',
                'icon' => $this->getIcon('wiki'),
                'link' => '#',
            ),

            array(
                'title' => 'Diagram',
                'icon' => $this->getIcon('diagram'),
                'link' => '#',
            ),
            array(
                'title' => 'Sketchbook',
                'icon' => $this->getIcon('sketchbook'),
                'link' => '#',
            ),

            array(
                'title' => 'Dropbox',
                'icon' => $this->getIcon('dropbox'),
                'link' => '#',
            ),
            array(
                'title' => 'Google Drive',
                'icon' => $this->getIcon('googledrive'),
                'link' => '#',
            ),

            array(
                'title' => 'Cursor',
                'icon' => $this->getIcon('cursor'),
                'link' => '#',
            ),
            array(
                'title' => 'Geolocation',
                'icon' => $this->getIcon('geolocation'),
                'link' => '#',
            ),
            array(
                'title' => 'Picture',
                'icon' => $this->getIcon('picture'),
                'link' => '#',
            ),
            array(
                'title' => 'Toggles',
                'icon' => $this->getIcon('toggles'),
                'link' => '#',
            ),

            array(
                'title' => 'Test',
                'icon' => $this->getIcon('test'),
                'link' => '#',
            ),

        );

        // replace this example code with whatever you need
        return $this->render('default/home.html.twig', array(
            'home_shortcuts' => $home_shortcuts,
        ));
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/login.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/lockscreen", name="lockscreen")
     */
    public function lockscreenAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/lockscreen.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     *
     * @param Request $request
     * @return void
     */
    public function logoutAction(Request $request)
    {
        echo 'logout ok -> redirect';
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
        return $this->render('default/home.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
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
        return $this->render('default/home.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    public function __call($name, $arguments)
    {
        var_dump($name);
        var_dump($arguments);

        die();
    }
}
