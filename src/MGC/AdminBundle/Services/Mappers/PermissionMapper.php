<?php

namespace MGC\AdminBundle\Services\Mappers;

use MGC\AdminBundle\Entity\Permission;
use MGC\AdminBundle\Exception\PermissionException;
use MGC\AdminBundle\Services\Permissions\Website;

class PermissionMapper {

    public function _construct() {

    }

    public function entityToDto(Permission $permission) {

    }

    public function dtoToEntity(Website $website) {
        $now = new \DateTime();

        $result = array();

        foreach ($website->getModules() as $module) {
            foreach ($module->getRules() as $rule){
                $active = false;
                if($module->isActive() && $rule->isActive()){
                    $active = true;
                }

                $permission = new Permission();
                $permission
                    ->setName($rule->getName())
                    ->setVar($rule->getVar())
                    ->setParams(json_encode($rule->getParams()))
                    ->setModule($module->getName())
                    ->setCategory($rule->getCategory())
                    ->setDateCreated()
                    ->setDateUpdated($now->format('Y-m-d H:i:s'))
                    ->setActive($active)
                    ->setOrdre($rule->getOrdre())
                ;
                array_push($result, $permission);
            }
        }

        return $result;
    }

    public function dtoArrayToEntity($websiteArray) {

        if(is_array($websiteArray)){

            $result = array();

            foreach ($websiteArray as $w) {
                array_push($result, $this->dtoToEntity($w));
            }

            return $result;

        }else{
            throw new PermissionException("dtoArrayToEntity: Parameter is not an array!");
        }

    }

}