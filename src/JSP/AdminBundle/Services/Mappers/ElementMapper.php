<?php

namespace JSP\AdminBundle\Services\Mappers;

use JSP\AdminBundle\Dto\Element\BottomBar;
use JSP\AdminBundle\Dto\Element\ConditionState;
use JSP\AdminBundle\Dto\Element\ConfigurationState;
use JSP\AdminBundle\Dto\Element\ElementForm;
use JSP\AdminBundle\Dto\Element\Popin;
use JSP\AdminBundle\Dto\Element\TimerState;
use JSP\CoreBundle\Entity\Element;

class ElementMapper {

    /**
     * @param $array
     * @return Element
     */
    public function yamlToEntity($array) {
        $element = new Element();

        $date_begin = $date_end = new \DateTime("now");
        if (isset($array['date_begin']) && !is_null($array['date_begin'])) {
            $date_begin = new \DateTime($array['date_begin']);
        }

        if (isset($array['date_end']) && !is_null($array['date_end'])) {
            $date_end = new \DateTime($array['date_end']);
        }

        $date_created = $date_updated = new \DateTime("now");
        if (isset($array['date_created']) && !is_null($array['date_created'])) {
            $date_created = new \DateTime($array['date_created']);
        }

        if (isset($array['date_updated']) && !is_null($array['date_updated'])) {
            $date_updated = new \DateTime($array['date_updated']);
        }

        $element->setName($array['name']);
        $element->setDateBegin($date_begin);
        $element->setDateEnd($date_end);
        $element->setData($array['data']);
        $element->setState($array['state']);
        $element->setActive($array['active']);
        $element->setDateCreated($date_created);
        $element->setDateUpdated($date_updated);

        return $element;
    }

    /**
     * @param Element $element
     * @return \JSP\AdminBundle\Dto\Element\Element
     */
    public function entityToDto(Element $element) {
        $elementDto = new \JSP\AdminBundle\Dto\Element\Element();

        $elementDto->setId($element->getid());
        $elementDto->setName($element->getName());
        $elementDto->setDateBegin($element->getDateBegin());
        $elementDto->setDateEnd($element->getDateEnd());
        $elementDto->setData($element->getData());
        $elementDto->setState($element->getState());
        $elementDto->setActive($element->isActive());
        $elementDto->setDateCreated($element->getDateCreated());
        $elementDto->setDateUpdated($element->getDateUpdated());

        $elementDto->setTimerState(new TimerState($element->getDateBegin(), $element->getDateEnd()));
        $elementDto->setConditionState(new ConditionState($element->getState(), $element->getDateBegin(), $element->getDateEnd()));
        $elementDto->setConfigurationStates($this->generateElementConfigurationStates($element));

        return $elementDto;
    }

    /**
     * @param array $entities The list filled with th entity to transform into a DTO list
     * @return array The list of DTOs
     */
    public function entitiesListToDtoList(array $entities) {
        $dtoList = [];

        foreach ($entities as $entity) {
            $dtoList[] = $this->entityToDto($entity);
        }

        return $dtoList;
    }

    public function DtoFormToEntity(ElementForm $elementForm) {
        $element = new Element();

        $date_begin = \DateTime::createFromFormat('d/m/Y H:i:s', $elementForm->getDateBegin());
        $date_end = \DateTime::createFromFormat('d/m/Y H:i:s', $elementForm->getDateEnd());

        $element->setId($elementForm->getId());
        $element->setName($elementForm->getName());
        $element->setDateBegin($date_begin);
        $element->setDateEnd($date_end);
        $element->setState($elementForm->getState());
        $element->setData($elementForm->getData());
        $element->setActive($elementForm->isActive());
        $element->setDateCreated($elementForm->getDateCreated());
        $element->setDateUpdated($elementForm->getDateUpdated());

        return $element;
    }

    public function entityToDtoForm(Element $element) {
        $elementForm = new ElementForm();

        $elementForm->setId($element->getId());
        $elementForm->setName($element->getName());
        $elementForm->setDateBegin($element->getDateBegin()->format('d/m/Y H:i:s'));
        $elementForm->setDateEnd($element->getDateEnd()->format('d/m/Y H:i:s'));
        $elementForm->setState($element->getState());
        $elementForm->setData($element->getData());
        $elementForm->setActive($element->isActive());
        $elementForm->setDateCreated($element->getDateCreated());
        $elementForm->setDateUpdated($element->getDateUpdated());

        return $elementForm;
    }

    private function generateElementConfigurationStates(Element $element) {
        $array = array();

        $configurationState = new ConfigurationState();
        $configurationState
            ->setName('settings')
            ->setTranslationCode('mgc.global.settings')
            ->setPercent(100)
            ->setComment('commentaire');
        array_push($array, $configurationState);

        $configurationState = new ConfigurationState();
        $configurationState
            ->setName('design')
            ->setTranslationCode('mgc.global.design')
            ->setPercent(75)
            ->setComment('commentaire 2');
        array_push($array, $configurationState);

        $configurationState = new ConfigurationState();
        $configurationState
            ->setName('stats')
            ->setTranslationCode('mgc.global.stats')
            ->setPercent(50)
            ->setComment('commentaire 3');
        array_push($array, $configurationState);

        return $array;
    }

    public function arrayToPopinDto($array) {
        $popin = new Popin();

        $popin
            ->setBackgroundColor($array['background_color'])
            ->setHeight($array['height'])
            ->setWidth($array['width'])
            ->setCloseButtonBackgroundImage($array['close_button_background_image'])
            ->setCloseButtonBackgroundPosition($array['close_button_background_position'])
            ->setCloseButtonBackgroundRepeat($array['close_button_background_repeat'])
            ->setCloseButtonCursor($array['close_button_cursor'])
            ->setCloseButtonHeight($array['close_button_height'])
            ->setCloseButtonWidth($array['close_button_width'])
            ->setCloseButtonMarginRight($array['close_button_margin_right'])
            ->setCloseButtonMarginTop($array['close_button_margin_top']);

        return $popin;
    }

    public function arrayToBottomBarDto($array) {
        $bottombar = new BottomBar();

        $bottombar
            ->setBackgroundColor($array['background_color'])
            ->setHeight($array['height'])
            ->setWidth($array['width'])
            ->setOpenButtonBackgroundImage($array['open_button_background_image'])
            ->setOpenButtonBackgroundPosition($array['open_button_background_position'])
            ->setOpenButtonBackgroundRepeat($array['open_button_background_repeat'])
            ->setOpenButtonCursor($array['open_button_cursor'])
            ->setOpenButtonHeight($array['open_button_height'])
            ->setOpenButtonWidth($array['open_button_width'])
            ->setOpenButtonMarginRight($array['open_button_margin_right'])
            ->setOpenButtonMarginTop($array['open_button_margin_top'])
            ->setCloseButtonBackgroundImage($array['close_button_background_image'])
            ->setCloseButtonBackgroundPosition($array['close_button_background_position'])
            ->setCloseButtonBackgroundRepeat($array['close_button_background_repeat'])
            ->setCloseButtonCursor($array['close_button_cursor'])
            ->setCloseButtonHeight($array['close_button_height'])
            ->setCloseButtonWidth($array['close_button_width'])
            ->setCloseButtonMarginRight($array['close_button_margin_right'])
            ->setCloseButtonMarginTop($array['close_button_margin_top']);

        return $bottombar;
    }

}