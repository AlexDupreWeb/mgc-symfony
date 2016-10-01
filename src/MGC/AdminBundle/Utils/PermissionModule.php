<?php

namespace MGC\Modules\Admin\PermissionBundle\Utils;


class PermissionModule
{
    private $name;
    private $uri;
    private $active;
    private $order;
    private $group;
    private $permissions;

    public function __construct($name, $uri, $active='1', $order=0, $group='') {
        $this->name = $name;
        $this->uri = $uri;
        $this->active = $active;
        $this->order = $order;
        $this->group = $group;
        $this->permissions = array();
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
    public function getUri() {
        return $this->uri;
    }

    /**
     * @param mixed $uri
     */
    public function setUri($uri) {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function isActive() {
        return $this->active;
    }

    /**
     * @param string $active
     */
    public function setActive($active) {
        $this->active = $active;
    }

    /**
     * @return int
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder($order) {
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getGroup() {
        return $this->group;
    }

    /**
     * @param string $group
     */
    public function setGroup($group) {
        $this->group = $group;
    }

    /**
     * @return array
     */
    public function getPermissions() {
        return $this->permissions;
    }

    /**
     * @param array $permissions
     */
    public function setPermissions($permissions) {
        $this->permissions = $permissions;
    }

    /**
     * @param PermissionRule $permission
     */
    public function addPermission(PermissionRule $permission) {
        array_push($this->permissions, $permission);
    }
}