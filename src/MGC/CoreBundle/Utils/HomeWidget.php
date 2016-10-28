<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 25/10/2016
 * Time: 18:10
 */

namespace MGC\CoreBundle\Utils;


class HomeWidget
{
    private $main_value;
    private $main_text;
    private $main_icon;
    private $footer_text;
    private $footer_icon;
    private $background;

    public function __construct(){
        $this->main_value = 160;
        $this->main_text = "Nouveaux achats";
        $this->main_icon = "fa fa-plus";
        $this->footer_text = "Plus d'infos";
        $this->footer_icon = "fa fa-arrow-circle-left";
        $this->background = "bg-orange";
    }

    /**
     * @return int
     */
    public function getMainValue()
    {
        return $this->main_value;
    }

    /**
     * @param int $main_value
     * @return HomeWidget
     */
    public function setMainValue($main_value)
    {
        $this->main_value = $main_value;
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
     * @return HomeWidget
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
     * @return HomeWidget
     */
    public function setMainIcon($main_icon)
    {
        $this->main_icon = $main_icon;
        return $this;
    }

    /**
     * @return string
     */
    public function getFooterText()
    {
        return $this->footer_text;
    }

    /**
     * @param string $footer_text
     * @return HomeWidget
     */
    public function setFooterText($footer_text)
    {
        $this->footer_text = $footer_text;
        return $this;
    }

    /**
     * @return string
     */
    public function getFooterIcon()
    {
        return $this->footer_icon;
    }

    /**
     * @param string $footer_icon
     * @return HomeWidget
     */
    public function setFooterIcon($footer_icon)
    {
        $this->footer_icon = $footer_icon;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * @param string $background
     * @return HomeWidget
     */
    public function setBackground($background)
    {
        $this->background = $background;
        return $this;
    }

}