<?php

namespace MGC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends MGCController
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        //dump($this->getUser());dump($lastUsername);die();

        // replace this example code with whatever you need
        return $this->render('default/login.html.twig', [
            'lastUsername' => $lastUsername,
            'error'         => $error,
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
        
    }
}