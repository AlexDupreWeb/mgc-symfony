<?php

namespace JSP\AdminBundle\Twig;

use JSP\AdminBundle\Dto\Element\Element;
use Symfony\Component\DependencyInjection\Container;

class InfoBoxExtension extends \Twig_Extension {

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * ProgressBarExtension constructor.
     * @param \Twig_Environment $twig
     * @param Container $container
     */
    public function __construct(\Twig_Environment $twig, Container $container) {
        $this->twig = $twig;
    }

    /**
     * @return array
     */
    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction('jspBootstrapInfoBox', array($this, 'getBootstrapInfoBox')),
            new \Twig_SimpleFunction('jspBootstrapInfoBoxProgressBar', array($this, 'getBootstrapInfoBoxProgressBar')),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'jsp_bootstrap_extension';
    }

    public function getBootstrapInfoBox(Element $element) {

        if ($element->getConditionState()->getCurrentState() == 'draft') {
            $boxColor = 'bg-gray';
            $boxIcon = 'fa-pencil';
        } elseif ($element->getConditionState()->getCurrentState() == 'scheduled') {
            $boxColor = 'bg-green';
            $boxIcon = 'fa-clock-o';
        } elseif ($element->getConditionState()->getCurrentState() == 'ongoing') {
            $boxColor = 'bg-green';
            $boxIcon = 'fa-play-circle-o';
        } elseif ($element->getConditionState()->getCurrentState() == 'stopped') {
            $boxColor = 'bg-yellow';
            $boxIcon = 'fa-pause-circle-o';
        } else {
            $boxColor = 'bg-red';
            $boxIcon = 'fa-stop-circle-o';
        }

        $boxText = "mgc.global.".$element->getConditionState()->getCurrentState();

        $html = $this->twig->render('JspAdminBundle:Bootstrap:infobox.html.twig', array(
            'element' => $element,
            'boxColor' => $boxColor,
            'boxIcon' => $boxIcon,
            'boxText' => $boxText,
        ));

        return $html;
    }

    public function getBootstrapInfoBoxProgressBar(Element $element, $type='' , $color='', $icon='') {
        $configurationState = $element->getConfigurationStateByName($type);

        $boxColor = $color;
        $boxIcon = $icon;

        if (!empty($configurationState)) {
            $boxNumber = $configurationState->getPercent().'%';
            $boxText = $configurationState->getTranslationCode();
            $progressBarValue = $configurationState->getPercent();
            $progressBarDescription = $configurationState->getComment();

            $html = $this->twig->render('JspAdminBundle:Bootstrap:infoboxprogressbar.html.twig', array(
                'element' => $element,
                'boxColor' => $boxColor,
                'boxIcon' => $boxIcon,
                'boxNumber' => $boxNumber,
                'boxText' => $boxText,
                'progressBarValue' => $progressBarValue,
                'progressBarDescription' => $progressBarDescription,
            ));

            return $html;
        }

        return null;
    }

}