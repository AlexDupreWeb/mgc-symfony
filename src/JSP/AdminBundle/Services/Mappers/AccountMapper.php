<?php

namespace JSP\AdminBundle\Services\Mappers;

use JSP\CoreBundle\Entity\Account;

class AccountMapper {

    /**
     * @param $array
     * @return Account
     */
    public function yamlToEntity($array){
        $account = new Account();

        $date_created = $date_updated = new \DateTime("now");
        if(isset($array['date_created']) && !is_null($array['date_created'])){
            $date_created = new \DateTime($array['date_created']);
        }

        if(isset($array['date_updated']) && !is_null($array['date_updated'])){
            $date_updated = new \DateTime($array['date_updated']);
        }

        $account->setName($array['name']);
        $account->setDescription($array['description']);
        $account->setDateCreated($date_created);
        $account->setDateUpdated($date_updated);

        return $account;
    }
}