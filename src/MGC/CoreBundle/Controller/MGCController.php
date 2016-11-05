<?php

namespace MGC\CoreBundle\Controller;

use MGC\AdminBundle\Services\AvatarService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MGCController extends Controller
{
    /**
     * @var AvatarService
     */
    protected $usersAvatarService;

    /**
     * @var string
     */
    protected $redirect;

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

    public function getAdminlteParams(){
        $params = $this->container->getParameter('adminlte');

        dump($params);
        die();
    }
    
    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null) {
        parent::setContainer($container);
        $this->usersAvatarService = $this->get('mgc.admin.service.users.avatar');
        $this->usersAvatarService->setUserAvatarAssetsForUserSession();
        
        $this->redirect = $this->checkRedirect();
        //$this->checkPermissions();
    }

    /**
     * Renders a view.
     *
     * @param string   $view       The view name
     * @param array    $parameters An array of parameters to pass to the view
     * @param Response $response   A response instance
     *
     * @return Response A Response instance
     */
    protected function render($view, array $parameters = array(), Response $response = null) {
        // Add theme on $views
        //$view = 'themes/'.$this->mpTheme."/".$view;
        //$parameters['mp_site_theme'] = $this->mpTheme;

        $parameters['toto'] = 'coucou de toto';

        if ($this->container->has('templating')) {
            return $this->container->get('templating')->renderResponse($view, $parameters, $response);
        }

        if (!$this->container->has('twig')) {
            throw new \LogicException('You can not use the "render" method if the Templating Component or the Twig Bundle are not available.');
        }

        if ($response === null) {
            $response = new Response();
        }

        $response->setContent($this->container->get('twig')->render($view, $parameters));

        return $response;
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
}
