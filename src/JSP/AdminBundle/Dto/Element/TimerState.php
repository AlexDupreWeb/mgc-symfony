<?php

namespace JSP\AdminBundle\Dto\Element;

class TimerState {

    /**
     * @var integer
     */
    private $total_days;

    /**
     * @var integer
     */
    private $remaining_days;

    /**
     * @var float
     */
    private $percent;

    /**
     * TimerState constructor.
     * @param \DateTime $dateBegin
     * @param \DateTime $dateEnd
     */
    public function __construct(\DateTime $dateBegin, \DateTime $dateEnd) {

        $this->total_days = 0;
        $this->remaining_days = 0;

        $this->percent = 0.0;


        $now = new \DateTime();

        if(!empty($dateBegin) && !empty($dateEnd)) {
            $this->total_days = $dateBegin->diff($dateEnd)->format('%a');
            $this->remaining_days = $now->diff($dateEnd)->format('%a');

            if($this->remaining_days > $this->total_days) {
                $this->remaining_days = $this->total_days;
            }

            $this->percent = ( 1 - $this->remaining_days / $this->total_days ) * 100;
            $this->percent = floor($this->percent);
        }

    }

    /**
     * @return int
     */
    public function getTotalDays() {
        return $this->total_days;
    }

    /**
     * @param int $total_days
     * @return TimerState
     */
    public function setTotalDays($total_days) {
        $this->total_days = $total_days;
        return $this;
    }

    /**
     * @return int
     */
    public function getRemainingDays() {
        return $this->remaining_days;
    }

    /**
     * @param int $remaining_days
     * @return TimerState
     */
    public function setRemainingDays($remaining_days) {
        $this->remaining_days = $remaining_days;
        return $this;
    }

    /**
     * @return float
     */
    public function getPercent() {
        return $this->percent;
    }

    /**
     * @param float $percent
     * @return TimerState
     */
    public function setPercent($percent) {
        $this->percent = $percent;
        return $this;
    }

}