<?php

namespace MGC\AdminBundle\Services\Mappers;

use MGC\AdminBundle\Entity\User;
use Symfony\Component\Validator\Constraints\DateTime;

class UserMapper {
    
    public function _construct(){

    }
    
    public function yamlToEntity($array, $encoder){
        $mgc_user = new User();
        
        $now = new \DateTime("now");
        if(!is_null($array['date_birth'])){
            $birthdate = new \DateTime($array['date_birth']);
        }else{
            $birthdate = new \DateTime("0000-00-00");
        }
        
        if(!is_null($array['password'])){
            $password = $array['password'];
        }else{
            $password = 'motdepasse';
        }
        $encoded_password = $encoder->encodePassword($mgc_user, $password);
        
        $mgc_user
            ->setLogin($array['login'])
            ->setPassword($encoded_password)
            ->setEmail($array['email'])
            ->setGender($array['gender'])
            ->setSname($array['sname'])
            ->setFname($array['fname'])
            ->setAvatar($array['avatar'])
            ->setIdCompany($array['id_company'])
            ->setCompanyJob($array['company_job'])
            ->setDateBirth($birthdate)
            ->setDateCreated($now)
            ->setDateUpdated($now)
            ->setActive($array['active'])
            ->setOrdre(0)
        ;
        
        return $mgc_user;
    }
    
}