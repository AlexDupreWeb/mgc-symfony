<?php

namespace MGC\AdminBundle\Services\Permissions;

class Website {

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @var array
     */
    private $modules;

    /**
     * Website constructor.
     * @param string $name
     * @param string $url
     * @param string $namespace
     */
    public function __construct($name, $url, $namespace) {
        $this->name = $name;
        $this->url = $url;
        $this->namespace = $namespace;
        $this->modules = array();
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Website
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Website
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getNamespace() {
        return $this->namespace;
    }

    /**
     * @param string $namespace
     * @return Website
     */
    public function setNamespace($namespace) {
        $this->namespace = $namespace;
        return $this;
    }

    /**
     * @return array
     */
    public function getModules() {
        return $this->modules;
    }

    /**
     * @param array $modules
     * @return Website
     */
    public function setModules($modules) {
        $this->modules = $modules;
        return $this;
    }

    /**
     * @param Module $module
     */
    public function addModule(Module $module) {
        array_push($this->modules, $module);
    }

    /**
     * @param string $ndd
     * @return boolean
     */
    public function isValidDomainName($ndd){
        return (
            preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $ndd) //valid chars check
            && preg_match("/^.{1,253}$/", $ndd) //overall length check
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $ndd) //length of each label
        );
    }

    /**
     * @param string $url
     * @return boolean
     */
    public function compareUrl($url) {
        //NOTE: filter_var can't be used because $_SERVER['HTTP_HOST'] hasn't protocol
        $tmp_url = str_replace(array('http://','https://','ftp://','www.'), '', $url);

        if(!empty($url) && $this->isValidDomainName($url) && $url==$tmp_url){
            return true;
        }

        return false;
    }

    /**
     * @return Website
     */
    public function reorderModules() {
        usort($this->modules, array('MGC\AdminBundle\Services\Permissions\Website','compareModules'));
        return $this;
    }

    /**
     * @param Module $a
     * @param Module $b
     * @param string $field
     * @return int
     */
    public static function compareModules(Module $a, Module $b, $field='order') {
        if($field == 'order'){
            if($a->getOrder() == $b->getOrder()) return 0;
            return ($a->getOrder() < $b->getOrder()) ? -1 : 1;
        }elseif($field == 'name'){
            return strcmp($a->getName(), $b->getName());
        }
    }

    /**
     * @return boolean
     */
    public function isAdmin() {
        return ($this->namespace == 'mgc') ? true : false;
    }

}