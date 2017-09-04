<?php

namespace MGC\TimeTrackingBundle\Services\Mappers\FullCalendar;

use MGC\TimeTrackingBundle\Dto\FullCalendar\Event;
use MGC\TimeTrackingBundle\Entity\Task;

class EventMapper {

    /**
     * @param Task $task
     * @return Event
     */
    public function entityToDto(Task $task) {

        $event = new Event();
        $event
            ->setTitle($task->getName())
            ->setStart($task->getDate())
            //->setEnd($task->getDate())
        ;

        return $event;

    }

}