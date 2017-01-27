<?php

namespace JSP\AdminBundle\Dto\Element;

class ConditionState {

    const STATE_DRAFT = "draft";
    const STATE_FINISHED = "finished";
    const STATE_ONGOING = "ongoing";
    const STATE_SCHEDULED = "scheduled";
    const STATE_STOPPED = "stopped";

    /**
     * @var string
     */
    private $currentState;

    public function __construct($state, \DateTime $dateBegin, \DateTime $dateEnd) {
        $stateArray = array(
            ConditionState::STATE_DRAFT,
            ConditionState::STATE_FINISHED,
            ConditionState::STATE_ONGOING,
            ConditionState::STATE_SCHEDULED,
            ConditionState::STATE_STOPPED
        );

        if (in_array($state, $stateArray)) {

            $this->calculateCurrentState($state, $dateBegin, $dateEnd);

        } else {
            throw new \Exception("STATE cannot be {$state}");
        }
    }

    private function calculateCurrentState($state, \DateTime $dateBegin, \DateTime $dateEnd) {
        $now = new \DateTime();

        if ($state == ConditionState::STATE_DRAFT) {
            $this->currentState = ConditionState::STATE_DRAFT;
        } elseif ($state == ConditionState::STATE_STOPPED) {
            $this->currentState = ConditionState::STATE_STOPPED;
        } elseif ($dateEnd->format('Y-m-d H:i:s') <= $now->format('Y-m-d H:i:s')) {
            $this->currentState = ConditionState::STATE_FINISHED;
        } elseif ($dateBegin->format('Y-m-d H:i:s') > $now->format('Y-m-d H:i:s')) {
            $this->currentState = ConditionState::STATE_SCHEDULED;
        } else {
            $this->currentState = ConditionState::STATE_ONGOING;
        }
    }

    /**
     * @return string
     */
    public function getCurrentState() {
        return $this->currentState;
    }

}