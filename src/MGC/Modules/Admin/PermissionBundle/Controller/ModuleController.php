<?php

namespace MGC\Modules\Admin\PermissionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ModuleController extends Controller
{
    /**
     * @Route("/admin/modules/", name="admin-mgc-modules")
     */
    public function indexAction()
    {
        return $this->render('PermissionBundle:Default:index.html.twig');
    }
}
