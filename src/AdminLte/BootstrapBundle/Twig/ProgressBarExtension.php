<?php

namespace AdminLte\BootstrapBundle\Twig;

use AdminLte\BootstrapBundle\Exception\BootstrapException;
use AdminLte\BootstrapBundle\Exception\BootstrapExtension;
use Symfony\Component\DependencyInjection\Container;

class ProgressBarExtension extends \Twig_Extension {

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
        return array(new \Twig_SimpleFunction('bootstrapProgressBar', array($this, 'getBootstrapProgressBar')));
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'alex_extension';
    }

    public function getBootstrapProgressBar($value, $color='auto', $weight='', $stages=array(), $stacked=false, $vertical=false) {

        $value = $this->checkValue($value);
        $weight = $this->checkWeight($weight);

        $color = $this->checkColor($color);
        $stages = $this->checkStages($stages);

        $stages = $this->calculateStages($value, $color, $stages, $stacked);

        $html = $this->twig->render('BootstrapBundle:Bootstrap:progressbar.html.twig', array(
            'value' => $value,
            'weight' => $weight,
            'stages' => $stages,
            'vertical' => $vertical
        ));

        return $html;
    }

    /**
     * @param float $value
     * @return float
     */
    private function checkValue($value) {
        if (empty($value) || !is_numeric($value)) {
            return 0;
        }
        return $value;
    }

    /**
     * @param string $color
     * @return array
     */
    private function checkColor($color) {
        if (in_array($color, array('green', 'success', 'yellow', 'warning', 'red', 'danger', 'blue', 'primary', 'aqua', 'info', 'black','auto','auto_inverse'))) {
            return $color;
        } else {
            throw new BootstrapException("Invalid color");
        }
    }

    /**
     * @param string $weight
     * @return string
     */
    private function checkWeight($weight) {
        if (in_array($weight, array('sm', 'xs', 'xxs'))) {
            return $weight;
        }
        return '';
    }

    /**
     * @param array $stages
     * @return array
     */
    private function checkStages(array $stages) {
        if (count($stages) > 0 && count($stages) <= 3) {
            return $stages;
        } else if(empty($stages)) {
            return array();
        } else {
            throw new BootstrapException("Invalid stages");
        }
    }

    private function calculateStages($value, $color, $stages, $stacked) {
        $array = array();
        $default_colors_array = array('green', 'yellow', 'red');
        $default_stages_array = array(50,90,100);
        $colors_array = array();

        if (is_array($stages) && !empty($stages)) {
            $default_stages_array = $stages;
        }

        dump($default_stages_array);

        $colors_array = $default_colors_array;
        if ($color == 'auto_reverse') {
            $colors_array = array_reverse($default_colors_array);
        }

        if ($stacked && in_array($color, array('auto', 'auto_reverse'))) {

            $previous_stage_value = 0;
            for ($i = 0, $cnt = count($default_stages_array); $i < $cnt; $i++) {

                $array[] = array(
                    'color' => $colors_array[$i],
                    'value' => ($default_stages_array[$i] <= $value) ? max(0, ($default_stages_array[$i] - $previous_stage_value)) : max(0,($value - $previous_stage_value))
                );

                $previous_stage_value = $default_stages_array[$i];
            }

        } elseif (!$stacked && in_array($color, array('auto', 'auto_reverse'))) {
            $color_final = '';

            for ($i = 0, $cnt = count($default_stages_array); $i < $cnt; $i++) {
                if ($default_stages_array[$i] >= $value && empty($color_final)) {
                    $color_final = $colors_array[$i];
                }
            }

            $array[] = array(
                'color' => $color_final,
                'value' => $value
            );
        } else {
            $array[] = array(
                'color' => $color,
                'value' => $value
            );
        }

        return $array;
    }

}
