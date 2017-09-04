<?php

namespace MGC\TimeTrackingBundle\Dto\FullCalendar;

use JMS\Serializer\Annotation as Serializer;

class Event {

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $title;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $allDay;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y-m-d'>")
     */
    private $start;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y-m-d'>")
     */
    private $end;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $url;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $className;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $editable;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $startEditable;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $durationEditable;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $resourceEditable;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $rendering;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $overlap;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $constraint;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $source;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $color;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $backgroundColor;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $borderColor;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $textColor;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Event
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Event
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAllDay() {
        return $this->allDay;
    }

    /**
     * @param bool $allDay
     * @return Event
     */
    public function setAllDay($allDay) {
        $this->allDay = $allDay;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     * @return Event
     */
    public function setStart($start) {
        $this->start = $start;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEnd() {
        return $this->end;
    }

    /**
     * @param \DateTime $end
     * @return Event
     */
    public function setEnd($end) {
        $this->end = $end;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Event
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getClassName() {
        return $this->className;
    }

    /**
     * @param string $className
     * @return Event
     */
    public function setClassName($className) {
        $this->className = $className;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEditable() {
        return $this->editable;
    }

    /**
     * @param bool $editable
     * @return Event
     */
    public function setEditable($editable) {
        $this->editable = $editable;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStartEditable() {
        return $this->startEditable;
    }

    /**
     * @param bool $startEditable
     * @return Event
     */
    public function setStartEditable($startEditable) {
        $this->startEditable = $startEditable;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDurationEditable() {
        return $this->durationEditable;
    }

    /**
     * @param bool $durationEditable
     * @return Event
     */
    public function setDurationEditable($durationEditable) {
        $this->durationEditable = $durationEditable;
        return $this;
    }

    /**
     * @return bool
     */
    public function isResourceEditable() {
        return $this->resourceEditable;
    }

    /**
     * @param bool $resourceEditable
     * @return Event
     */
    public function setResourceEditable($resourceEditable) {
        $this->resourceEditable = $resourceEditable;
        return $this;
    }

    /**
     * @return string
     */
    public function getRendering() {
        return $this->rendering;
    }

    /**
     * @param string $rendering
     * @return Event
     */
    public function setRendering($rendering) {
        $this->rendering = $rendering;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOverlap() {
        return $this->overlap;
    }

    /**
     * @param bool $overlap
     * @return Event
     */
    public function setOverlap($overlap) {
        $this->overlap = $overlap;
        return $this;
    }

    /**
     * @return string
     */
    public function getConstraint() {
        return $this->constraint;
    }

    /**
     * @param string $constraint
     * @return Event
     */
    public function setConstraint($constraint) {
        $this->constraint = $constraint;
        return $this;
    }

    /**
     * @return string
     */
    public function getSource() {
        return $this->source;
    }

    /**
     * @param string $source
     * @return Event
     */
    public function setSource($source) {
        $this->source = $source;
        return $this;
    }

    /**
     * @return string
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * @param string $color
     * @return Event
     */
    public function setColor($color) {
        $this->color = $color;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackgroundColor() {
        return $this->backgroundColor;
    }

    /**
     * @param string $backgroundColor
     * @return Event
     */
    public function setBackgroundColor($backgroundColor) {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getBorderColor() {
        return $this->borderColor;
    }

    /**
     * @param string $borderColor
     * @return Event
     */
    public function setBorderColor($borderColor) {
        $this->borderColor = $borderColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getTextColor() {
        return $this->textColor;
    }

    /**
     * @param string $textColor
     * @return Event
     */
    public function setTextColor($textColor) {
        $this->textColor = $textColor;
        return $this;
    }

}