<?php

namespace MGC\Modules\Admin\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/admin/users/", name="admin-mod-user-list")
     */
    public function indexAction()
    {
        return $this->render('UserBundle:Default:index.html.twig');
    }

    /**
     * @Route("/admin/users/add/", name="admin-mod-user-add")
     */
    public function addAction()
    {
        return $this->render('UserBundle:Default:add.html.twig');
    }

    /**
     * @Route("/admin/users/design/{id}", requirements={"id": "\d+"})
     */
    public function designAction($id)
    {
        return $this->render('UserBundle:Default:design.html.twig');
    }

    /**
     * @Route("/admin/users/edit/{id}", requirements={"id": "\d+"})
     */
    public function editAction($id)
    {
        return $this->render('UserBundle:Default:edit.html.twig');
    }

    /**
     * @Route("/admin/users/gadgets/{id}", requirements={"id": "\d+"})
     */
    public function gadgetsAction($id)
    {
        return $this->render('UserBundle:Default:gadgets.html.twig');
    }

    /**
     * @Route("/admin/users/infos/{id}", requirements={"id": "\d+"})
     */
    public function infosAction($id)
    {
        return $this->render('UserBundle:Default:infos.html.twig');
    }

    /**
     * @Route("/admin/users/permissions/{id}", requirements={"id": "\d+"})
     */
    public function permissionsAction($id)
    {
        return $this->render('UserBundle:Default:permissions.html.twig');
    }

    /**
     * @Route("/admin/users/sessions/{id}", requirements={"id": "\d+"})
     */
    public function sessionsAction($id)
    {
        return $this->render('UserBundle:Default:sessions.html.twig');
    }

    /**
     * @Route("/admin/users/shortcuts/{id}", requirements={"id": "\d+"})
     */
    public function shortcutsAction($id)
    {
        return $this->render('UserBundle:Default:shortcuts.html.twig');
    }

    /**
     * @Route("/admin/users/stats/{id}", requirements={"id": "\d+"})
     */
    public function statsAction($id)
    {
        return $this->render('UserBundle:Default:stats.html.twig');
    }

    /**
     * @Route("/admin/users/timeline/{id}", requirements={"id": "\d+"})
     */
    public function timelineAction($id)
    {
        return $this->render('UserBundle:Default:timeline.html.twig');
    }
}
