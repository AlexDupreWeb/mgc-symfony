<?php

namespace MGC\AdminBundle\Controller;

use MGC\CoreBundle\Controller\MGCController;
use MGC\Modules\Admin\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints\DateTime;

class UserController extends MGCController
{
    /**
     * @Route("/admin/users/", name="admin-mgc-users")
     */
    public function indexAction()
    {
        $users = $this->getDoctrine()->getRepository('AdminBundle:User')->findAll();

        $users = $this->usersAvatarService->setUserAvatarAssetsFromArray($users);

        return $this->render('AdminBundle:User:index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * @Route("/admin/users/add/", name="admin-mgc-users-add")
     */
    public function addAction()
    {

        return $this->render('AdminBundle:User:add.html.twig');
    }

    /**
     * @Route("/admin/users/design/{id}", requirements={"id": "\d+"})
     */
    public function designAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AdminBundle:User')->find($id);

        $skins = array(
            'skin-blue' 		=> array('bg1'=>'#367fa9','bg2'=>'#3c8dbc','bg3'=>'#222d32','bg4'=>'#f4f5f7'),
            'skin-black' 		=> array('bg1'=>'#fefefe','bg2'=>'#fefefe','bg3'=>'#222222','bg4'=>'#f4f5f7'),
            'skin-purple' 		=> array('bg1'=>'#555299','bg2'=>'#605ca8','bg3'=>'#222d32','bg4'=>'#f4f5f7'),
            'skin-green' 		=> array('bg1'=>'#008d4c','bg2'=>'#00a65a','bg3'=>'#222d32','bg4'=>'#f4f5f7'),
            'skin-red' 			=> array('bg1'=>'#d33724','bg2'=>'#dd4b39','bg3'=>'#222d32','bg4'=>'#f4f5f7'),
            'skin-yellow' 		=> array('bg1'=>'#db8b0b','bg2'=>'#f39c12','bg3'=>'#222d32','bg4'=>'#f4f5f7'),

            'skin-blue-light' 	=> array('bg1'=>'#367fa9','bg2'=>'#3c8dbc','bg3'=>'#f9fafc','bg4'=>'#f4f5f7'),
            'skin-black-light' 	=> array('bg1'=>'#fefefe','bg2'=>'#fefefe','bg3'=>'#f9fafc','bg4'=>'#f4f5f7'),
            'skin-purple-light' => array('bg1'=>'#555299','bg2'=>'#605ca8','bg3'=>'#f9fafc','bg4'=>'#f4f5f7'),
            'skin-green-light' 	=> array('bg1'=>'#008d4c','bg2'=>'#00a65a','bg3'=>'#f9fafc','bg4'=>'#f4f5f7'),
            'skin-red-light' 	=> array('bg1'=>'#d33724','bg2'=>'#dd4b39','bg3'=>'#f9fafc','bg4'=>'#f4f5f7'),
            'skin-yellow-light' => array('bg1'=>'#db8b0b','bg2'=>'#f39c12','bg3'=>'#f9fafc','bg4'=>'#f4f5f7'),
        );

        $backgrounds = array(
            'bg-lightgray' => 'adminlte/dist/img/bg_lightgray.png',
            'bg-gray' => 'adminlte/dist/img/bg_gray.png',
            'bg-darkgray' => 'adminlte/dist/img/bg_darkgray.png',
        );

        $layouts = array(
            'fixed' => 'fixed (plein écran) ',
            'layout-boxed' => 'layout-boxed (écran réduit 1250px max) ',
            'sidebar-collapse' => 'sidebar-collapse (sidebar fermé)',
        );

        return $this->render('AdminBundle:User:design.html.twig', array(
            'user' => $user,

            'backgrounds' => $backgrounds,
            'layouts' => $layouts,
            'skins' => $skins,

            'user_background' => $backgrounds['bg-lightgray'],
            'user_layout' => 'layout-boxed',
            'user_skin' => $skins['skin-blue'],
        ));
    }

    /**
     * @Route("/admin/users/edit/{id}", requirements={"id": "\d+"})
     */
    public function editAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AdminBundle:User')->find($id);

        return $this->render('AdminBundle:User:edit.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * @Route("/admin/users/gadgets/{id}", requirements={"id": "\d+"})
     */
    public function gadgetsAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AdminBundle:User')->find($id);

        return $this->render('AdminBundle:User:gadgets.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * @Route("/admin/users/infos/{id}", requirements={"id": "\d+"})
     */
    public function infosAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AdminBundle:User')->find($id);

        return $this->render('AdminBundle:User:infos.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * @Route("/admin/users/permissions/{id}", requirements={"id": "\d+"})
     */
    public function permissionsAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AdminBundle:User')->find($id);

        return $this->render('AdminBundle:User:permissions.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * @Route("/admin/users/sessions/{id}", requirements={"id": "\d+"})
     */
    public function sessionsAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AdminBundle:User')->find($id);

        return $this->render('AdminBundle:User:sessions.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * @Route("/admin/users/shortcuts/{id}", requirements={"id": "\d+"})
     */
    public function shortcutsAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AdminBundle:User')->find($id);

        return $this->render('AdminBundle:User:shortcuts.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * @Route("/admin/users/stats/{id}", requirements={"id": "\d+"})
     */
    public function statsAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AdminBundle:User')->find($id);

        return $this->render('AdminBundle:User:stats.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * @Route("/admin/users/timeline/{id}", requirements={"id": "\d+"})
     */
    public function timelineAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AdminBundle:User')->find($id);

        return $this->render('AdminBundle:User:timeline.html.twig', array(
            'user' => $user,
        ));
    }
}
