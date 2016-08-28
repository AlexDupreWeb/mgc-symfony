<?php

namespace AppBundle\Controller;

use MGC\Modules\Admin\PermissionBundle\Utils\PermissionFilesLoader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;

class DefaultController extends Controller
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
     * @Route("/test", name="test")
     */
    public function testAction(Request $request)
    {

        $pf = new PermissionFilesLoader(
            $this->container->getParameter('kernel.root_dir'),
            $this->getParameter('kernel.bundles')
        );

        //echo '<pre>';var_dump($pf->getPermissionBundles());echo '</pre>';
        // echo '<pre>';var_dump($pf->getPermissionBundle(1));echo '</pre>';

        $tmp = $pf->getPermissionBundle(0);
        $pf->parsePermissions($tmp);

        $tmp = $pf->getPermissionBundle(1);
        //$pf->parsePermissions($tmp);
        //$tmp = $pf->getPermissionBundle(2);

        $tmpParsePerm = $pf->parsePermissions($tmp)->getWebsites();
        echo '<pre>';var_dump($tmpParsePerm);echo '</pre>';
        $tmpParsePerm = serialize($tmpParsePerm);
        echo '<pre>';var_dump($tmpParsePerm);echo '</pre>';
        $tmpParsePerm = unserialize($tmpParsePerm);
        echo '<pre>';var_dump($tmpParsePerm);echo '</pre>';
        
        die();

        /* $array = array(
            'website' => array(
                'name' => "Back Office",
                'url' => "http://mgc.alexandre-dupre.fr",
                'namespace' => "mgc",
                'modules' => array(
                    array(
                        'name' => "administration",
                        'uri' => "admin",
                        'active' => "1",
                        'order' => "0",
                        'group' => "admin",
                        'permissions' => array(
                            array(
                                'name' => "allow_access",
                                'var' => "",
                                'params' => "",
                                'category' => "admin",
                                'active' => "1",
                                'order' => "0",
                            ),
                        ),

                    ),

                )
            ),
        );

        echo '<pre>';
        echo Yaml::dump($array, 10);
        echo '</pre>';*/


        die();
    }
}
