<?php

namespace MGC\Modules\Admin\PermissionBundle\Utils;

use MGC\Modules\Admin\PermissionBundle\Exception\PermissionException;
use Symfony\Component\Yaml\Yaml;

class PermissionFilesLoader
{
    // $appPath = $this->container->getParameter('kernel.root_dir');
    private $appPath;

    // $installedBundles = $this->getParameter('kernel.bundles');
    private $installedBundles;

    private $bundlesArray;
    private $websitesArray;

    public function __construct($appPath, $installedBundles)
    {
        $this->appPath = $appPath;
        $this->installedBundles = $installedBundles;

        $this->bundlesArray = array();
        $this->websitesArray = array();

        $this->init();
    }

    private function init()
    {
        foreach ($this->installedBundles as $bundleName => $bundleNamespace){

            //Clean path
            // - Step1: Remove /app in appPath
            // - Step2: Add /src and add buncleNamespace
            // - Step3: Remove the last / and class name
            $bundlePath = $this->appPath;

            $bundlePath = explode('/', $bundlePath);
            if(end($bundlePath) == 'app'){
                array_pop($bundlePath);
            }
            $bundlePath = implode('/', $bundlePath);

            $bundlePath .= '/src/'.$bundleNamespace.'/';
            $bundlePath = str_replace('\\', '/', $bundlePath);

            $bundlePath = explode('/', $bundlePath);
            if(empty(end($bundlePath))){
                array_pop($bundlePath);
            }
            array_pop($bundlePath);
            $bundlePath = implode('/', $bundlePath);

            // Check if config file exist
            if(file_exists($bundlePath.'/Resources/config/mgc.yml')){
                array_push($this->bundlesArray, $bundlePath);
            }

        }
    }

    public function getPermissionBundles()
    {
        return $this->bundlesArray;
    }

    public function getPermissionBundle($key)
    {
        if(array_key_exists($key, $this->bundlesArray)){
            return $this->bundlesArray[$key];
        }else{
            return null;
        }
    }

    public function getPermissions($bundlePath)
    {
        $configFilePath = $bundlePath.'/Resources/config/mgc.yml';
        $yaml = Yaml::parse(file_get_contents($configFilePath));
        return $yaml;
    }

    public function parsePermissions($bundlePath)
    {
        $array = $this->getPermissions($bundlePath);
        $permissionWebsites = $this->websitesArray;

        foreach($array as $website){

            // Website
            $tmp_website = null;
            foreach ($permissionWebsites as $w){
                if($w->getNamespace() == $website['namespace']){
                    if($w->getName() == $website['name'] && $w->getUrl() == $website['url']){
                        $tmp_website = $w;
                    }else{
                        throw new PermissionException("Permission error, the website {$w->getNamespace()} already exist but properties are differents!");
                    }
                }
            }
            if(empty($tmp_website)){
                $tmp_website = new PermissionWebsite(
                    $website['name'],
                    $website['url'],
                    $website['namespace']
                );
            }

            // Module
            if(isset($website['modules']) && !empty($website['modules'])){
                foreach($website['modules'] as $module){
                    $tmp_module = null;
                    foreach ($tmp_website->getModules() as $m){
                        if($m->getname() == $module['name']){
                            if($m->getUri() == $module['uri'] && $m->isActive() == $module['active'] && $m->getOrder() == $module['order'] && $m->getGroup() == $module['group']){
                                $tmp_module = $m;
                            }else{
                                throw new PermissionException("Permission error, the module {$m->getName()} already exist but properties are differents!");
                            }
                        }
                    }
                    if(empty($tmp_module)){
                        $tmp_module = new PermissionModule(
                            $module['name'],
                            $module['uri'],
                            $module['active'],
                            $module['order'],
                            $module['group']
                        );
                    }

                    if(isset($module['permissions']) && !empty($module['permissions'])){
                        foreach($module['permissions'] as $permission){
                            $tmp_permission = new PermissionRule(
                                $permission['name'],
                                $permission['var'],
                                $permission['params'],
                                $permission['category'],
                                $permission['active'],
                                $permission['order']
                            );

                            $tmp_module->addPermission($tmp_permission);
                        }
                    }

                    $tmp_website->addModule($tmp_module);
                }
            }

            $tmp_website->reorderModules();
            array_push($permissionWebsites, $tmp_website);
        }

        $this->websitesArray = $permissionWebsites;
        return $this;
    }

    public function getWebsites()
    {
        return $this->websitesArray;
    }

    public function getWebsiteByName($websiteName)
    {
        foreach ($this->websitesArray as $w){
            if($websiteName == $w->getName()){
                return $w;
            }
        }

        return null;
    }

    public function getAdminWebsite()
    {
        foreach ($this->websitesArray as $w){
            if($w->compareUrl($_SERVER['HTTP_HOST'])){
                return $w;
            }
        }

        return null;
    }

    public function getOtherWebsites()
    {
        $other = array();

        foreach ($this->websitesArray as $w){
            if(!$w->compareUrl($_SERVER['HTTP_HOST'])){
                array_push($other, $w);
            }
        }

        return $other;
    }

}