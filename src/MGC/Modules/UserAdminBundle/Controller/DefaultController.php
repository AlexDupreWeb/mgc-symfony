<?php

namespace MGC\Modules\UserAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/mod-admin-users/")
     */
    public function indexAction()
    {
        return $this->render('UserAdminBundle:Default:index.html.twig');
    }

    /**
     * @Route("/mod-admin-users/add/")
     */
    public function addAction()
    {
        return $this->render('UserAdminBundle:Default:add.html.twig');
    }

    /**
     * @Route("/mod-admin-users/design/{id}", requirements={"id": "\d+"})
     */
    public function designAction($id)
    {
        return $this->render('UserAdminBundle:Default:design.html.twig');
    }

    /**
     * @Route("/mod-admin-users/edit/{id}", requirements={"id": "\d+"})
     */
    public function editAction($id)
    {
        return $this->render('UserAdminBundle:Default:edit.html.twig');
    }

    /**
     * @Route("/mod-admin-users/gadgets/{id}", requirements={"id": "\d+"})
     */
    public function gadgetsAction($id)
    {
        return $this->render('UserAdminBundle:Default:gadgets.html.twig');
    }

    /**
     * @Route("/mod-admin-users/infos/{id}", requirements={"id": "\d+"})
     */
    public function infosAction($id)
    {
        return $this->render('UserAdminBundle:Default:infos.html.twig');
    }

    /**
     * @Route("/mod-admin-users/permissions/{id}", requirements={"id": "\d+"})
     */
    public function permissionsAction($id)
    {
        return $this->render('UserAdminBundle:Default:permissions.html.twig');
    }

    /**
     * @Route("/mod-admin-users/sessions/{id}", requirements={"id": "\d+"})
     */
    public function sessionsAction($id)
    {
        return $this->render('UserAdminBundle:Default:sessions.html.twig');
    }

    /**
     * @Route("/mod-admin-users/shortcuts/{id}", requirements={"id": "\d+"})
     */
    public function shortcutsAction($id)
    {
        return $this->render('UserAdminBundle:Default:shortcuts.html.twig');
    }

    /**
     * @Route("/mod-admin-users/stats/{id}", requirements={"id": "\d+"})
     */
    public function statsAction($id)
    {
        return $this->render('UserAdminBundle:Default:stats.html.twig');
    }

    /**
     * @Route("/mod-admin-users/timeline/{id}", requirements={"id": "\d+"})
     */
    public function timelineAction($id)
    {
        return $this->render('UserAdminBundle:Default:timeline.html.twig');
    }
}
