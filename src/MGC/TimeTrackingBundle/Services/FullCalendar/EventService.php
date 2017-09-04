<?php

namespace MGC\TimeTrackingBundle\Services\FullCalendar;

use JMS\Serializer\Serializer;

class EventService {

    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(Serializer $serializer) {
        $this->serializer = $serializer;
    }

    public function serializeItemsToJson(array $items) {
        $jsonArray = array();
        foreach ($items as $item){
            $jsonArray[] = $this->serializer->serialize($item, 'json');
        }

        return $jsonArray;
    }

    public function serializeToJson($item) {
        return $this->serializer->serialize($item, 'json');
    }

}