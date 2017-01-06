<?php

namespace MGC\AdminBundle\Services\Permissions;

use MGC\AdminBundle\Entity\User;
use MGC\AdminBundle\Exception\PermissionException;
use Symfony\Component\Yaml\Yaml;

class PermissionService {

    /**
     * @var array
     */
    private $installedBundles;

    /**
     * @var array
     */
    private $websitesArray;

    /**
     * @var string
     */
    private $appPath;

    public function __construct($installedBundles, $appPath) {
        $this->installedBundles = $installedBundles;

        $this->websitesArray = array();
        $this->appPath = $this->cleanAppPath($appPath);
    }
    
    public function getUserPermissions(User $user) {
        
    }
    
    public function getModulePermissions(Module $module) {
        
    }
    
    public function loadBundlePermissions() {
        $mgcConfigBundlesPathArray = $this->extractBundleWithMgcConfigFile();

        $websites = $this->websitesArray;

        foreach ($mgcConfigBundlesPathArray as $bundlePath) {
            $configFilePath = $bundlePath.'/Resources/config/mgc.yml';
            $mgcConfigFileContent = Yaml::parse(file_get_contents($configFilePath));

            if(isset($mgcConfigFileContent['website']) && !empty($mgcConfigFileContent['website'])) {
                $this->mergeWebsites($websites, $mgcConfigFileContent);
            }
        }

        /** @var Website $w */
        foreach ($websites as $w) {
            $w->reorderModules();

            /** @var Module $m */
            foreach($w->getModules() as $m) {
                $m->reorderRules();
            }
        }

        return $websites;
    }

    private function cleanAppPath($path) {
        $path = explode('/', $path);
        if(end($path) == 'app') {
            array_pop($path);
        }
        $path = implode('/', $path);

        return $path;
    }

    private function extractBundleWithMgcConfigFile() {
        $mgcConfigBundlesPathArray = array();
        foreach($this->installedBundles as $bundleName => $bundleNamespace) {
            //Clean path
            // - Step1: Remove /app in appPath
            // - Step2: Add /src and add bundleNamespace
            // - Step3: Remove the last / and class name

            $bundlePath = "{$this->appPath}/src/{$bundleNamespace}/";
            $bundlePath = str_replace('\\', '/', $bundlePath);
            $bundlePath = explode('/', $bundlePath);

            if(empty(end($bundlePath))){
                array_pop($bundlePath);
            }
            array_pop($bundlePath);
            $bundlePath = implode('/', $bundlePath);

            // Check if config file exist
            if(file_exists($bundlePath.'/Resources/config/mgc.yml')){
                array_push($mgcConfigBundlesPathArray, $bundlePath);
            }
        }

        return $mgcConfigBundlesPathArray;
    }

    private function mergeWebsites(&$websiteArray, $mgcConfigFileContentWebsites) {
        foreach ($mgcConfigFileContentWebsites as $key => $mgcConfigFileContentWebsite) {
            if($key == 'website'){
                $websiteDto = null;

                // Check if module already exist
                foreach ($websiteArray as $w) {
                    if ($w->getname() == $mgcConfigFileContentWebsite['name']) {
                        if (
                            $w->getUrl() == $mgcConfigFileContentWebsite['url'] &&
                            $w->getNamespace() == $mgcConfigFileContentWebsite['namespace']
                        ) {
                            $websiteDto = $w;
                        } else {
                            throw new PermissionException("Permission error, the website {$w->getName()} already exist but properties are differents!");
                        }
                    }
                }

                if (empty($websiteDto)) {
                    $websiteDto = new Website(
                        $mgcConfigFileContentWebsite['name'],
                        $mgcConfigFileContentWebsite['url'],
                        $mgcConfigFileContentWebsite['namespace']
                    );

                    // Push new Website in Websites array
                    array_push($websiteArray, $websiteDto);
                }

                // MODULES
                if (isset($mgcConfigFileContentWebsite['modules']) && !empty($mgcConfigFileContentWebsite['modules'])) {
                    $this->mergeModules($websiteDto, $mgcConfigFileContentWebsite['modules']);
                }
            }
        }
    }

    private function mergeModules(&$websiteDto, $mgcConfigFileContentModules) {
        foreach ($mgcConfigFileContentModules as $mgcConfigFileContentModule) {
            $moduleDto = null;

            // Check if module already exist
            foreach ($websiteDto->getModules() as $m) {
                if ($m->getname() == $mgcConfigFileContentModule['name']) {
                    if (
                        $m->getUri() == $mgcConfigFileContentModule['uri'] &&
                        $m->isActive() == $mgcConfigFileContentModule['active'] &&
                        $m->getOrder() == $mgcConfigFileContentModule['order'] &&
                        $m->getGroup() == $mgcConfigFileContentModule['group']
                    ) {
                        $moduleDto = $m;
                    } else {
                        throw new PermissionException("Permission error, the module {$m->getName()} already exist but properties are differents!");
                    }
                }
            }

            // When module not exist
            if (empty($moduleDto)) {
                $moduleDto = new Module(
                    $mgcConfigFileContentModule['name'],
                    $mgcConfigFileContentModule['uri'],
                    $mgcConfigFileContentModule['active'],
                    $mgcConfigFileContentModule['order'],
                    $mgcConfigFileContentModule['group']
                );

                $websiteDto->addModule($moduleDto);
            }

            // RULES
            if (isset($mgcConfigFileContentModule['rules']) && !empty($mgcConfigFileContentModule['rules'])) {
                $this->mergeRules($moduleDto, $mgcConfigFileContentModule['rules']);
            }
        }
    }

    private function mergeRules(&$moduleDto, $mgcConfigFileContentRules) {
        foreach ($mgcConfigFileContentRules as $mgcConfigFileContentRule) {
            $ruleDto = null;

            // Check if Rule already exist
            foreach ($moduleDto->getRules() as $r) {
                if ($r->getname() == $mgcConfigFileContentRule['name']) {
                    if (
                            $r->getVar() == $mgcConfigFileContentRule['var'] &&
                            $r->getParams() == $mgcConfigFileContentRule['params'] &&
                            $r->getCategory() == $mgcConfigFileContentRule['category'] &&
                            $r->isActive() == $mgcConfigFileContentRule['active'] &&
                            $r->getOrder() == $mgcConfigFileContentRule['order']
                    ) {
                        $ruleDto = $r;
                    } else {
                        throw new PermissionException("Permission error, the rule {$r->getName()} already exist but properties are differents!");
                    }
                }
            }

            // When Rule not exist add it in Module
            if (empty($ruleDto)) {
                $ruleDto = new Rule(
                    $mgcConfigFileContentRule['name'],
                    $mgcConfigFileContentRule['var'],
                    $mgcConfigFileContentRule['params'],
                    $mgcConfigFileContentRule['category'],
                    $mgcConfigFileContentRule['active'],
                    $mgcConfigFileContentRule['order']
                );

                // Push new Rule in Rules array
                $moduleDto->addRule($ruleDto);
            }
        }
    }
}