<?php

namespace MGC\AdminBundle\Services\Permissions;

class Module {

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $uri;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var integer
     */
    private $order;

    /**
     * @var string
     */
    private $group;

    /**
     * @var array
     */
    private $rules;


    /**
     * Module constructor.
     * @param string $name
     * @param string $uri
     * @param boolean $active
     * @param int $order
     * @param string $group
     */
    public function __construct($name, $uri, $active=true, $order=0, $group='') {
        $this->name = $name;
        $this->uri = $uri;
        $this->active = $active;
        $this->order = $order;
        $this->group = $group;
        $this->rules = array();
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Module
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getUri() {
        return $this->uri;
    }

    /**
     * @param string $uri
     * @return Module
     */
    public function setUri($uri) {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive() {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return Module
     */
    public function setActive($active) {
        $this->active = $active;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * @param int $order
     * @return Module
     */
    public function setOrder($order) {
        $this->order = $order;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroup() {
        return $this->group;
    }

    /**
     * @param string $group
     * @return Module
     */
    public function setGroup($group) {
        $this->group = $group;
        return $this;
    }

    /**
     * @return array
     */
    public function getRules() {
        return $this->rules;
    }

    /**
     * @param array $rules
     * @return Module
     */
    public function setRules($rules) {
        $this->rules = $rules;
        return $this;
    }

    /**
     * @param Rule $rule
     */
    public function addRule(Rule $rule) {
        array_push($this->rules, $rule);
    }

    /**
     * @return Module
     */
    public function reorderRules() {
        usort($this->rules, array('MGC\AdminBundle\Services\Permissions\Module','compareRules'));
        return $this;
    }

    /**
     * @param Rule $a
     * @param Rule $b
     * @param string $field
     * @return int
     */
    public static function compareRules(Rule $a, Rule $b, $field='order') {
        if($field == 'order'){
            if($a->getOrder() == $b->getOrder()) return 0;
            return ($a->getOrder() < $b->getOrder()) ? -1 : 1;
        }elseif($field == 'name'){
            return strcmp($a->getName(), $b->getName());
        }
    }
}