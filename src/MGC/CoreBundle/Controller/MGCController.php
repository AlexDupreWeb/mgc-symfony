<?php

namespace MGC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MGCController extends Controller
{
    public function __construct() {}

    public function getIcon($name, $theme='default'){
        $icons = $this->container->getParameter('icons');

        if(isset($icons[$theme][$name])){
            return $icons[$theme][$name];
        }elseif(isset($icons[$theme]['no_icon'])){
            return $icons[$theme]['no_icon'];
        }

        return null;
    }

}
