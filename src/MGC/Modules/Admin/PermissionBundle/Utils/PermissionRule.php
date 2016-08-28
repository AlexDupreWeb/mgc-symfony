<?php

namespace MGC\Modules\Admin\PermissionBundle\Utils;


class PermissionRule
{
    private $name;
    private $var;
    private $params;
    private $category;
    private $active;
    private $order;

    public function __construct($name, $var, $params='', $category='normal', $active='1', $order=0) {
        $this->name = $name;
        $this->var = $var;
        $this->params = $params;
        $this->category = $category;
        $this->active = $active;
        $this->order = $order;
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
    public function getVar() {
        return $this->var;
    }

    /**
     * @param mixed $var
     */
    public function setVar($var) {
        $this->var = $var;
    }

    /**
     * @return string
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * @param string $params
     */
    public function setParams($params) {
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * @param string $params
     */
    public function setCategory($category) {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function isActive() {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active) {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order) {
        $this->order = $order;
    }
}