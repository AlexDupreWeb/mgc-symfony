<?php

namespace JSP\AdminBundle\Dto\Element;

use JMS\Serializer\Annotation as Serializer;

class BottomBar {

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $background_color;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $text_align;

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
    private $open_button_background_image;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $open_button_background_position;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $open_button_background_repeat;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $open_button_cursor;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $open_button_height;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $open_button_width;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $open_button_margin_top;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $open_button_margin_right;

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
     * @return BottomBar
     */
    public function setBackgroundColor($background_color) {
        $this->background_color = $background_color;
        return $this;
    }

    /**
     * @return string
     */
    public function getTextAlign() {
        return $this->text_align;
    }

    /**
     * @param string $text_align
     * @return BottomBar
     */
    public function setTextAlign($text_align) {
        $this->text_align = $text_align;
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
     * @return BottomBar
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
     * @return BottomBar
     */
    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }

    /**
     * @return string
     */
    public function getOpenButtonBackgroundImage() {
        return $this->open_button_background_image;
    }

    /**
     * @param string $open_button_background_image
     * @return BottomBar
     */
    public function setOpenButtonBackgroundImage($open_button_background_image) {
        $this->open_button_background_image = $open_button_background_image;
        return $this;
    }

    /**
     * @return string
     */
    public function getOpenButtonBackgroundPosition() {
        return $this->open_button_background_position;
    }

    /**
     * @param string $open_button_background_position
     * @return BottomBar
     */
    public function setOpenButtonBackgroundPosition($open_button_background_position) {
        $this->open_button_background_position = $open_button_background_position;
        return $this;
    }

    /**
     * @return string
     */
    public function getOpenButtonBackgroundRepeat() {
        return $this->open_button_background_repeat;
    }

    /**
     * @param string $open_button_background_repeat
     * @return BottomBar
     */
    public function setOpenButtonBackgroundRepeat($open_button_background_repeat) {
        $this->open_button_background_repeat = $open_button_background_repeat;
        return $this;
    }

    /**
     * @return string
     */
    public function getOpenButtonCursor() {
        return $this->open_button_cursor;
    }

    /**
     * @param string $open_button_cursor
     * @return BottomBar
     */
    public function setOpenButtonCursor($open_button_cursor) {
        $this->open_button_cursor = $open_button_cursor;
        return $this;
    }

    /**
     * @return int
     */
    public function getOpenButtonHeight() {
        return $this->open_button_height;
    }

    /**
     * @param int $open_button_height
     * @return BottomBar
     */
    public function setOpenButtonHeight($open_button_height) {
        $this->open_button_height = $open_button_height;
        return $this;
    }

    /**
     * @return int
     */
    public function getOpenButtonWidth() {
        return $this->open_button_width;
    }

    /**
     * @param int $open_button_width
     * @return BottomBar
     */
    public function setOpenButtonWidth($open_button_width) {
        $this->open_button_width = $open_button_width;
        return $this;
    }

    /**
     * @return int
     */
    public function getOpenButtonMarginTop() {
        return $this->open_button_margin_top;
    }

    /**
     * @param int $open_button_margin_top
     * @return BottomBar
     */
    public function setOpenButtonMarginTop($open_button_margin_top) {
        $this->open_button_margin_top = $open_button_margin_top;
        return $this;
    }

    /**
     * @return int
     */
    public function getOpenButtonMarginRight() {
        return $this->open_button_margin_right;
    }

    /**
     * @param int $open_button_margin_right
     * @return BottomBar
     */
    public function setOpenButtonMarginRight($open_button_margin_right) {
        $this->open_button_margin_right = $open_button_margin_right;
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
     * @return BottomBar
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
     * @return BottomBar
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
     * @return BottomBar
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
     * @return BottomBar
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
     * @return BottomBar
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
     * @return BottomBar
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
     * @return BottomBar
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
     * @return BottomBar
     */
    public function setCloseButtonMarginRight($close_button_margin_right) {
        $this->close_button_margin_right = $close_button_margin_right;
        return $this;
    }

    public static function getClass() {
        return 'BottomBar';
    }

}