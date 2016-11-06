<?php

namespace MGC\CoreBundle\Utils;


class HomeThumbnail
{
    const PICTURE_TYPE_ICON = 'icon';
    const PICTURE_TYPE_IMAGE = 'image';

    const DEFAULT_PICTURE_TYPE = self::PICTURE_TYPE_ICON;

    /**
     * @var string
     */
    private $main_text;
    /**
     * @var string
     */
    private $main_icon;
    /**
     * @var string
     */
    private $main_image;
    /**
     * @var string
     */
    private $main_link;
    /**
     * @var string
     */
    private $main_picture_type;

    /**
     * HomeThumbnail constructor.
     * @param string $text
     * @param string $icon
     * @param string $image
     * @param string $link
     */
    public function __construct($text, $icon, $image, $link, $picture_type=self::DEFAULT_PICTURE_TYPE){
        $this->main_text = $text;
        $this->main_icon = $icon;
        $this->main_image = $image;
        $this->main_link = $link;

        $this->main_picture_type = $picture_type;
    }

    /**
     * @return string
     */
    public function getMainPictureType()
    {
        return $this->main_picture_type;
    }

    /**
     * @param string $main_picture_type
     * @return HomeThumbnail
     */
    public function setMainPictureType($main_picture_type)
    {
        $this->main_picture_type = $main_picture_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getMainText()
    {
        return $this->main_text;
    }

    /**
     * @param string $main_text
     * @return HomeThumbnail
     */
    public function setMainText($main_text)
    {
        $this->main_text = $main_text;
        return $this;
    }

    /**
     * @return string
     */
    public function getMainIcon()
    {
        return $this->main_icon;
    }

    /**
     * @param string $main_icon
     * @return HomeThumbnail
     */
    public function setMainIcon($main_icon)
    {
        $this->main_icon = $main_icon;
        return $this;
    }

    /**
     * @return string
     */
    public function getMainImage()
    {
        return $this->main_image;
    }

    /**
     * @param string $main_image
     * @return HomeThumbnail
     */
    public function setMainImage($main_image)
    {
        $this->main_image = $main_image;
        return $this;
    }

    /**
     * @return string
     */
    public function getMainLink()
    {
        return $this->main_link;
    }

    /**
     * @param string $main_link
     * @return HomeThumbnail
     */
    public function setMainLink($main_link)
    {
        $this->main_link = $main_link;
        return $this;
    }

}