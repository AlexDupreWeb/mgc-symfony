<?php

namespace MGC\CoreBundle\Controller;

use MGC\AdminBundle\Services\AvatarService;
use MGC\AdminBundle\Services\Permissions\PermissionService;
use MGC\CoreBundle\Services\ParametersService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MGCController extends Controller
{
    /**
     * @var ParametersService
     */
    protected $parametersService;

    /**
     * @var AvatarService
     */
    protected $usersAvatarService;

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

    public function getUrlFromRoute($name, $params=array()){
        $router = $this->container->get('router');

        if($router->getRouteCollection()->get($name)){
            $url = $this->get('router')->generate($name, $params);
        }else{
            $url = '#';
        }

        return $url;
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
        $this->parametersService = $this->get('mgc.core.service.parameters');

        $this->usersAvatarService = $this->get('mgc.admin.service.users.avatar');
        $this->usersAvatarService->setUserAvatarAssetsForUserSession();

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

        //$parameters['toto'] = 'coucou de toto';

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

}
