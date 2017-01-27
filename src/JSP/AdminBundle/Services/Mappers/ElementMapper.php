<?php

namespace JSP\AdminBundle\Services\Mappers;

use JSP\AdminBundle\Dto\Element\ConditionState;
use JSP\AdminBundle\Dto\Element\TimerState;
use JSP\CoreBundle\Entity\Element;

class ElementMapper {

    /**
     * @param $array
     * @return Element
     */
    public function yamlToEntity($array) {
        $element = new Element();

        $date_begin = $date_end = new \DateTime("now");
        if (isset($array['date_begin']) && !is_null($array['date_begin'])) {
            $date_begin = new \DateTime($array['date_begin']);
        }

        if (isset($array['date_end']) && !is_null($array['date_end'])) {
            $date_end = new \DateTime($array['date_end']);
        }

        $date_created = $date_updated = new \DateTime("now");
        if (isset($array['date_created']) && !is_null($array['date_created'])) {
            $date_created = new \DateTime($array['date_created']);
        }

        if (isset($array['date_updated']) && !is_null($array['date_updated'])) {
            $date_updated = new \DateTime($array['date_updated']);
        }

        $element->setName($array['name']);
        $element->setDateBegin($date_begin);
        $element->setDateEnd($date_end);
        $element->setData($array['data']);
        $element->setState($array['state']);
        $element->setActive($array['active']);
        $element->setDateCreated($date_created);
        $element->setDateUpdated($date_updated);

        return $element;
    }

}