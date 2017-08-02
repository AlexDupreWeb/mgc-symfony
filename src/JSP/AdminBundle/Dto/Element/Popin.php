<?php

namespace JSP\AdminBundle\Dto\Element;

use JMS\Serializer\Annotation as Serializer;

class Popin {

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $background_color;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $height;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $width;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $close_button_background_image;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $close_button_background_position;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $close_button_background_repeat;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $close_button_cursor;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $close_button_height;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $close_button_width;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $close_button_margin_top;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $close_button_margin_right;

    /**
     * @return string
     */
    public function getBackgroundColor() {
        return $this->background_color;
    }

    /**
     * @param string $background_color
     * @return Popin
     */
    public function setBackgroundColor($background_color) {
        $this->background_color = $background_color;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Popin
     */
    public function setHeight($height) {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth() {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Popin
     */
    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }

    /**
     * @return string
     */
    public function getCloseButtonBackgroundImage() {
        return $this->close_button_background_image;
    }

    /**
     * @param string $close_button_background_image
     * @return Popin
     */
    public function setCloseButtonBackgroundImage($close_button_background_image) {
        $this->close_button_background_image = $close_button_background_image;
        return $this;
    }

    /**
     * @return string
     */
    public function getCloseButtonBackgroundPosition() {
        return $this->close_button_background_position;
    }

    /**
     * @param string $close_button_background_position
     * @return Popin
     */
    public function setCloseButtonBackgroundPosition($close_button_background_position) {
        $this->close_button_background_position = $close_button_background_position;
        return $this;
    }

    /**
     * @return string
     */
    public function getCloseButtonBackgroundRepeat() {
        return $this->close_button_background_repeat;
    }

    /**
     * @param string $close_button_background_repeat
     * @return Popin
     */
    public function setCloseButtonBackgroundRepeat($close_button_background_repeat) {
        $this->close_button_background_repeat = $close_button_background_repeat;
        return $this;
    }

    /**
     * @return string
     */
    public function getCloseButtonCursor() {
        return $this->close_button_cursor;
    }

    /**
     * @param string $close_button_cursor
     * @return Popin
     */
    public function setCloseButtonCursor($close_button_cursor) {
        $this->close_button_cursor = $close_button_cursor;
        return $this;
    }

    /**
     * @return int
     */
    public function getCloseButtonHeight() {
        return $this->close_button_height;
    }

    /**
     * @param int $close_button_height
     * @return Popin
     */
    public function setCloseButtonHeight($close_button_height) {
        $this->close_button_height = $close_button_height;
        return $this;
    }

    /**
     * @return int
     */
    public function getCloseButtonWidth() {
        return $this->close_button_width;
    }

    /**
     * @param int $close_button_width
     * @return Popin
     */
    public function setCloseButtonWidth($close_button_width) {
        $this->close_button_width = $close_button_width;
        return $this;
    }

    /**
     * @return int
     */
    public function getCloseButtonMarginTop() {
        return $this->close_button_margin_top;
    }

    /**
     * @param int $close_button_margin_top
     * @return Popin
     */
    public function setCloseButtonMarginTop($close_button_margin_top) {
        $this->close_button_margin_top = $close_button_margin_top;
        return $this;
    }

    /**
     * @return int
     */
    public function getCloseButtonMarginRight() {
        return $this->close_button_margin_right;
    }

    /**
     * @param int $close_button_margin_right
     * @return Popin
     */
    public function setCloseButtonMarginRight($close_button_margin_right) {
        $this->close_button_margin_right = $close_button_margin_right;
        return $this;
    }

    public static function getClass() {
        return 'Popin';
    }

}