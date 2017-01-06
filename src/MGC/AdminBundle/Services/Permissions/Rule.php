<?php

namespace MGC\AdminBundle\Services\Permissions;

class Rule {

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $var;

    /**
     * @var array
     */
    private $params;

    /**
     * @var string
     */
    private $category;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var integer
     */
    private $order;


    /**
     * Rule constructor.
     * @param string $name
     * @param string $var
     * @param string $params
     * @param string $category
     * @param string $active
     * @param int $order
     */
    public function __construct($name, $var, $params='', $category='normal', $active='1', $order=0) {
        $this->name = $name;
        $this->var = $var;
        $this->params = $params;
        $this->category = $category;
        $this->active = $active;
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Rule
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getVar() {
        return $this->var;
    }

    /**
     * @param string $var
     * @return Rule
     */
    public function setVar($var) {
        $this->var = $var;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * @param array $params
     * @return Rule
     */
    public function setParams($params) {
        $this->params = $params;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * @param string $category
     * @return Rule
     */
    public function setCategory($category) {
        $this->category = $category;
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
     * @return Rule
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
     * @return Rule
     */
    public function setOrder($order) {
        $this->order = $order;
        return $this;
    }

}