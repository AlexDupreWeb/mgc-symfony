<?php

namespace MGC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MGCController extends Controller
{
    protected $redirect;

    public function __construct() {}

<<<<<<< Updated upstream
    public function getIcon($name, $theme='default'){
        $icons = $this->container->getParameter('icons');

        if(isset($icons[$theme][$name])){
            return $icons[$theme][$name];
        }elseif(isset($icons[$theme]['no_icon'])){
            return $icons[$theme]['no_icon'];
        }

        return null;
    }

    public function getAdminlteParams(){
        $params = $this->container->getParameter('adminlte');

        dump($params);
        die();
    }

=======
    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null) {
        parent::setContainer($container);

        $this->redirect = $this->checkRedirect();
        //$this->checkPermissions();
    }

    private function checkRedirect(){
        $router = $this->get('router');
        //dump($router->getContext()); // RequestContext
        //dump($router->getContext()->getPathInfo()); // /login
        //dump($this->getUser()->getEmail()); // alexandre@alexandre-dupre.fr

        $return = null;

        if($this->getUser()) {
            if($router->getContext()->getPathInfo() == '/login'){
                $return =  $this->redirectToRoute('home');
            }
        }else{
            if($router->getContext()->getPathInfo() != '/login'){
                $return =  $this->redirectToRoute('login');
            }
        }

        return $return;
    }

    private function checkPermissions(){

    }
>>>>>>> Stashed changes
}
