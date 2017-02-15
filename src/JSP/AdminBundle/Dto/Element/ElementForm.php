<?php

namespace JSP\AdminBundle\Dto\Element;

class ElementForm {
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $dateBegin;

    /**
     * @var string
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
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ElementForm
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
     * @return ElementForm
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateBegin() {
        return $this->dateBegin;
    }

    /**
     * @param string $dateBegin
     * @return ElementForm
     */
    public function setDateBegin($dateBegin) {
        $this->dateBegin = $dateBegin;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateEnd() {
        return $this->dateEnd;
    }

    /**
     * @param string $dateEnd
     * @return ElementForm
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
     * @return ElementForm
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
     * @return ElementForm
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
     * @return ElementForm
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
     * @return ElementForm
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
     * @return ElementForm
     */
    public function setDateUpdated($dateUpdated) {
        $this->dateUpdated = $dateUpdated;
        return $this;
    }

}