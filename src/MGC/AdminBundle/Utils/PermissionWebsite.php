<?php

namespace MGC\Modules\Admin\PermissionBundle\Utils;


class PermissionWebsite
{
    private $name;
    private $url;
    private $namespace;
    private $modules;

    public function __construct($name, $url, $namespace) {
        $this->name = $name;
        $this->url = $url;
        $this->namespace = $namespace;
        $this->modules = array();
    }

    public function reorderModules() {
        usort($this->modules, array('MGC\Modules\Admin\PermissionBundle\Utils\PermissionWebsite','compareModules'));
    }

    public static function compareModules(PermissionModule $a, PermissionModule $b, $field='order') {
        if($field == 'order'){
            if($a->getOrder() == $b->getOrder()) return 0;
            return ($a->getOrder() < $b->getOrder()) ? -1 : 1;
        }elseif($field == 'name'){
            return strcmp($a->getName(), $b->getName());
        }
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url) {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getNamespace() {
        return $this->namespace;
    }

    /**
     * @param mixed $namespace
     */
    public function setNamespace($namespace) {
        $this->namespace = $namespace;
    }

    /**
     * @return mixed
     */
    public function getModules() {
        return $this->modules;
    }

    /**
     * @param array $modules
     */
    public function setModules($modules) {
        $this->modules = $modules;
    }

    /**
     * @param Module $module
     */
    public function addModule(PermissionModule $module) {
        array_push($this->modules, $module);
    }

    public function compareUrl($url) {
        //NOTE: filter_var can't be used because $_SERVER['HTTP_HOST'] hasn't protocol
        $tmp_url = str_replace(array('http://','https://','ftp://','www.'), '', $url);

        if(!empty($url) && $this->isValidDomainName($url) && $url==$tmp_url){
            return true;
        }
        
        return false;
    }

    public function isValidDomainName($ndd){
        return (
            preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $ndd) //valid chars check
            && preg_match("/^.{1,253}$/", $ndd) //overall length check
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $ndd) //length of each label
        );
    }
}