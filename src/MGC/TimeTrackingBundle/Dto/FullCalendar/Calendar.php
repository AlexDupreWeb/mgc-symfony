<?php

namespace MGC\TimeTrackingBundle\Dto\FullCalendar;

use JMS\Serializer\Annotation as Serializer;

class Calendar {

    // header: {
    //     left: 'prev,next,today,prevYear,nextYear',
    //     center: 'title',
    //     right: 'month,agendaWeek,agendaDay,listWeek'
    // }

    const HEADER_POSITION_CENTER    = 'center';
    const HEADER_POSITION_LEFT      = 'left';
    const HEADER_POSITION_RIGHT     = 'right';

    const HEADER_BTN_DAY            = 'agendaDay';
    const HEADER_BTN_LIST           = 'listWeek';
    const HEADER_BTN_MONTH          = 'month';
    const HEADER_BTN_NEXT           = 'next';
    const HEADER_BTN_NEXTYEAR       = 'nextYear';
    const HEADER_BTN_PREV           = 'prev';
    const HEADER_BTN_PREVYEAR       = 'prevYear';
    const HEADER_BTN_TODAY          = 'today';
    const HEADER_BTN_WEEK           = 'agendaWeek';
    const HEADER_TEXT_TITLE         = 'title';

    // buttonText: {
    //     today: 'aujourd hui',
    //     month: 'mois',
    //     week: 'semaine',
    //     day: 'jour',
    //     list: 'liste',
    //     prev: '<',
    //     next: '>',
    //     prevYear: '<<',
    //     nextYear: '>>'
    // }

    const BUTTON_TEXT_DAY           = 'day';
    const BUTTON_TEXT_LIST          = 'list';
    const BUTTON_TEXT_MONTH         = 'month';
    const BUTTON_TEXT_TODAY         = 'today';
    const BUTTON_TEXT_WEEK          = 'week';

    const BUTTON_TEXT_NEXT          = 'next';
    const BUTTON_TEXT_NEXTYEAR      = 'nextYear';
    const BUTTON_TEXT_PREV          = 'prev';
    const BUTTON_TEXT_PREVYEAR      = 'prevYear';

    // bootstrapGlyphicons: {
    //     close: 'glyphicon-remove',
    //     prev: 'fa fa-chevron-left',
    //     next: 'fa fa-chevron-right',
    //     prevYear: 'glyphicon-backward',
    //     nextYear: 'glyphicon-forward'
    // },

    const BOOTSTRAP_GLYPHICONS_CLOSE    = 'close';
    const BOOTSTRAP_GLYPHICONS_NEXT     = 'next';
    const BOOTSTRAP_GLYPHICONS_NEXTYEAR = 'nextYear';
    const BOOTSTRAP_GLYPHICONS_PREV     = 'prev';
    const BOOTSTRAP_GLYPHICONS_PREVYEAR = 'prevYear';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("schedulerLicenseKey")
     */
    private $schedulerLicenseKey = 'CC-Attribution-NonCommercial-NoDerivatives';

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $header;

    /**
     * @var array
     * @Serializer\Type("array")
     * @Serializer\SerializedName("buttonText")
     */
    private $buttonText;

    /**
     * @var array
     * @Serializer\Type("array")
     * @Serializer\SerializedName("bootstrapGlyphicons")
     */
    private $bootstrapGlyphicons;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\SerializedName("defaultDate")
     */
    private $defaultDate;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("navLinks")
     */
    private $navLinks;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $editable;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("eventLimit")
     */
    private $eventLimit;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("weekNumbers")
     */
    private $weekNumbers;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $locale;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $theme;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    private $events;

    /**
     * @return string
     */
    public function getSchedulerLicenseKey() {
        return $this->schedulerLicenseKey;
    }

    /**
     * @param string $schedulerLicenseKey
     * @return Calendar
     */
    public function setSchedulerLicenseKey($schedulerLicenseKey) {
        $this->schedulerLicenseKey = $schedulerLicenseKey;
        return $this;
    }

    /**
     * @return array
     */
    public function getHeader() {
        return $this->header;
    }

    /**
     * @param array $header
     * @return Calendar
     */
    public function setHeader($header) {
        $this->header = $header;
        return $this;
    }

    /**
     * @return array
     */
    public function getButtonText() {
        return $this->buttonText;
    }

    /**
     * @param array $buttonText
     * @return Calendar
     */
    public function setButtonText($buttonText) {
        $this->buttonText = $buttonText;
        return $this;
    }

    /**
     * @return array
     */
    public function getBootstrapGlyphicons() {
        return $this->bootstrapGlyphicons;
    }

    /**
     * @param array $bootstrapGlyphicons
     * @return Calendar
     */
    public function setBootstrapGlyphicons($bootstrapGlyphicons) {
        $this->bootstrapGlyphicons = $bootstrapGlyphicons;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDefaultDate() {
        return $this->defaultDate;
    }

    /**
     * @param \DateTime $defaultDate
     * @return Calendar
     */
    public function setDefaultDate($defaultDate) {
        $this->defaultDate = $defaultDate;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNavLinks() {
        return $this->navLinks;
    }

    /**
     * @param bool $navLinks
     * @return Calendar
     */
    public function setNavLinks($navLinks) {
        $this->navLinks = $navLinks;
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
     * @return Calendar
     */
    public function setEditable($editable) {
        $this->editable = $editable;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEventLimit() {
        return $this->eventLimit;
    }

    /**
     * @param bool $eventLimit
     * @return Calendar
     */
    public function setEventLimit($eventLimit) {
        $this->eventLimit = $eventLimit;
        return $this;
    }

    /**
     * @return bool
     */
    public function isWeekNumbers() {
        return $this->weekNumbers;
    }

    /**
     * @param bool $weekNumbers
     * @return Calendar
     */
    public function setWeekNumbers($weekNumbers) {
        $this->weekNumbers = $weekNumbers;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocale() {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return Calendar
     */
    public function setLocale($locale) {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return string
     */
    public function getTheme() {
        return $this->theme;
    }

    /**
     * @param string $theme
     * @return Calendar
     */
    public function setTheme($theme) {
        $this->theme = $theme;
        return $this;
    }

    /**
     * @return array
     */
    public function getEvents() {
        return $this->events;
    }

    /**
     * @param array $events
     * @return Calendar
     */
    public function setEvents($events) {
        $this->events = $events;
        return $this;
    }

}