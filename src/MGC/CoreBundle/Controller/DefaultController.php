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

        // replace this example code with whatever you need
        return $this->render('default/home.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
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
