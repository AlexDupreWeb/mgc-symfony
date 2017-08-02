<?php

namespace JSP\AdminBundle\Dto\Element;


class ConfigurationState {

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $translation_code;

    /**
     * @var float
     */
    private $percent;

    /**
     * @var string
     */
    private $comment;

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ConfigurationState
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getTranslationCode() {
        return $this->translation_code;
    }

    /**
     * @param string $translation_code
     * @return ConfigurationState
     */
    public function setTranslationCode($translation_code) {
        $this->translation_code = $translation_code;
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
     * @return ConfigurationState
     */
    public function setPercent($percent) {
        $this->percent = $percent;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment() {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return ConfigurationState
     */
    public function setComment($comment) {
        $this->comment = $comment;
        return $this;
    }

}