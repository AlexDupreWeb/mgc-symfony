<?php

namespace JSP\AdminBundle\Dto\Element;

class Element {
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $dateBegin;

    /**
     * @var \DateTime
     */
    private $dateEnd;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $data;

    /**
     * @var bool
     */
    private $active;

    /**
     * @var \DateTime
     */
    private $dateCreated;

    /**
     * @var \DateTime
     */
    private $dateUpdated;

    /**
     * @var TimerState
     */
    private $timerState;

    /**
     * @var ConditionState
     */
    private $conditionState;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Element
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Element
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateBegin() {
        return $this->dateBegin;
    }

    /**
     * @param \DateTime $dateBegin
     * @return Element
     */
    public function setDateBegin($dateBegin) {
        $this->dateBegin = $dateBegin;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateEnd() {
        return $this->dateEnd;
    }

    /**
     * @param \DateTime $dateEnd
     * @return Element
     */
    public function setDateEnd($dateEnd) {
        $this->dateEnd = $dateEnd;
        return $this;
    }

    /**
     * @return string
     */
    public function getState() {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Element
     */
    public function setState($state) {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @param string $data
     * @return Element
     */
    public function setData($data) {
        $this->data = $data;
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
     * @return Element
     */
    public function setActive($active) {
        $this->active = $active;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated() {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     * @return Element
     */
    public function setDateCreated($dateCreated) {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateUpdated() {
        return $this->dateUpdated;
    }

    /**
     * @param \DateTime $dateUpdated
     * @return Element
     */
    public function setDateUpdated($dateUpdated) {
        $this->dateUpdated = $dateUpdated;
        return $this;
    }

    /**
     * @return TimerState
     */
    public function getTimerState() {
        return $this->timerState;
    }

    /**
     * @param TimerState $timerState
     * @return Element
     */
    public function setTimerState($timerState) {
        $this->timerState = $timerState;
        return $this;
    }

    /**
     * @return ConditionState
     */
    public function getConditionState() {
        return $this->conditionState;
    }

    /**
     * @param ConditionState $conditionState
     * @return Element
     */
    public function setConditionState($conditionState) {
        $this->conditionState = $conditionState;
        return $this;
    }

}