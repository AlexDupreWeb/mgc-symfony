<?php

namespace JSP\AdminBundle\Services\FormBuilder;

use JSP\AdminBundle\Dto\Element\BottomBar;
use JSP\AdminBundle\Dto\Element\ElementForm;
use JSP\AdminBundle\Dto\Element\Popin;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Translation\DataCollectorTranslator;
use Symfony\Component\Yaml\Yaml;

class ElementService {

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var Container $container
     */
    protected $container;

    /**
     * @var \AppKernel
     */
    private $kernel;

    /**
     * @var DataCollectorTranslator
     */
    private $translator;

    /**
     * @var string
     */
    private $kernelRootDir;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var array
     */
    private $elementStates;

    /**
     * @var array
     */
    private $cssBackgroundRepeat;

    /**
     * @var array
     */
    private $cssCursor;

    /**
     * @var array
     */
    private $cssTextAlign;

    /**
     * ElementService constructor.
     * @param FormFactoryInterface $formFactory
     * @param Container $container
     * @param DataCollectorTranslator $translator
     * @param string $kernelRootDir
     * @param string $locale
     */
    public function __construct(FormFactoryInterface $formFactory, Container $container, DataCollectorTranslator $translator, $kernelRootDir, $locale) {
        $this->formFactory = $formFactory;
        $this->container = $container;
        $this->kernel = $container->get('kernel');
        $this->translator = $translator;
        $this->kernelRootDir = $kernelRootDir;
        $this->locale = $locale;

        $this->chargeElementsStatesFromParameters();
        $this->chargeElementDesignCssFromParameters();
    }

    /**
     * @param ElementForm|null $elementForm
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createElementFormBuilder(ElementForm $elementForm=null) {
        $form = $this->formFactory->createBuilder(FormType::class, $elementForm)

            //ELEMENT CONFIG
            ->add('name', TextType::class, array('label' => "Update element*"))
            ->add('date_begin', TextType::class, array('label' => "Update element"))
            ->add('date_end', TextType::class, array('label' => "Update element"))
            ->add('state', ChoiceType::class, array(
                'label' => "Update element",
                'placeholder' => false,
                'choices' => $this->elementStates
            ))
            ->add('active', CheckboxType::class, array(
                'label' => "Update element",
                'required' => false
            ))

            //FORM SUBMIT BUTTON
            ->add('save', SubmitType::class, array('label' => "Update element"))

            ->getForm();

        return $form;
    }

    /**
     * @param Popin|null $popin
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createElementPopinFormBuilder(Popin $popin=null) {
        $form = $this->formFactory
            ->createNamedBuilder('popin', FormType::class, $popin)

            //POPIN CONFIG
            ->add('background_color', TextType::class, array('label' => "Popin background-color"))
            ->add('height', TextType::class, array('label' => "Popin height"))
            ->add('width', TextType::class, array('label' => "Popin width"))

            //POPIN CLOSE BUTTON CONFIG
            ->add('close_button_background_image', TextType::class, array('label' => "Popin - CloseButton background-image"))
            ->add('close_button_background_position', TextType::class, array('label' => "Popin - CloseButton background-position"))
            ->add('close_button_background_repeat', ChoiceType::class, array(
                'label' => "Popin - CloseButton background-repeat",
                'placeholder' => false,
                'choices' => $this->cssBackgroundRepeat
            ))
            ->add('close_button_cursor', ChoiceType::class, array(
                'label' => "Popin - CloseButton cursor",
                'placeholder' => false,
                'choices' => $this->cssCursor
            ))
            ->add('close_button_height', TextType::class, array('label' => "Popin - CloseButton height"))
            ->add('close_button_margin_top', TextType::class, array('label' => "Popin - CloseButton margin-top"))
            ->add('close_button_margin_right', TextType::class, array('label' => "Popin - CloseButton margin-right"))
            ->add('close_button_width', TextType::class, array('label' => "Popin - CloseButton width"))

            //FORM SUBMIT BUTTON
            ->add('save', SubmitType::class, array('label' => "Update element"))

            ->getForm();

        return $form;
    }

    public function createElementBottomBarFormBuilder(BottomBar $bottombar=null) {
        $form = $this->formFactory
            ->createNamedBuilder('bottombar', FormType::class, $bottombar)

            //BOTTOMBAR CONFIG
            ->add('background_color', TextType::class, array('label' => "BottomBar background-color"))
            ->add('text_align', TextType::class, array('label' => "BottomBar text-align"))
            ->add('text_align', ChoiceType::class, array(
                'label' => "BottomBar text-align",
                'placeholder' => false,
                'choices' => $this->cssTextAlign
            ))
            ->add('height', TextType::class, array('label' => "BottomBar height"))
            ->add('width', TextType::class, array('label' => "BottomBar width"))

            //BOTTOMBAR OPEN BUTTON CONFIG
            ->add('open_button_background_image', TextType::class, array('label' => "BottomBar - OpenButton background-image"))
            ->add('open_button_background_position', TextType::class, array('label' => "BottomBar - OpenButton background-position"))
            ->add('open_button_background_repeat', ChoiceType::class, array(
                'label' => "BottomBar - OpenButton background-repeat",
                'placeholder' => false,
                'choices' => $this->cssBackgroundRepeat
            ))
            ->add('open_button_cursor', ChoiceType::class, array(
                'label' => "BottomBar - OpenButton cursor",
                'placeholder' => false,
                'choices' => $this->cssCursor
            ))
            ->add('open_button_height', TextType::class, array('label' => "BottomBar - OpenButton height"))
            ->add('open_button_margin_top', TextType::class, array('label' => "BottomBar - OpenButton margin-top"))
            ->add('open_button_margin_right', TextType::class, array('label' => "BottomBar - OpenButton margin-right"))
            ->add('open_button_width', TextType::class, array('label' => "BottomBar - OpenButton width"))

            //BOTTOMBAR CLOSE BUTTON CONFIG
            ->add('close_button_background_image', TextType::class, array('label' => "BottomBar - CloseButton background-image"))
            ->add('close_button_background_position', TextType::class, array('label' => "BottomBar - CloseButton background-position"))
            ->add('close_button_background_repeat', ChoiceType::class, array(
                'label' => "BottomBar - CloseButton background-repeat",
                'placeholder' => false,
                'choices' => $this->cssBackgroundRepeat
            ))
            ->add('close_button_cursor', ChoiceType::class, array(
                'label' => "BottomBar - CloseButton cursor",
                'placeholder' => false,
                'choices' => $this->cssCursor
            ))
            ->add('close_button_height', TextType::class, array('label' => "BottomBar - CloseButton height"))
            ->add('close_button_margin_top', TextType::class, array('label' => "BottomBar - CloseButton margin-top"))
            ->add('close_button_margin_right', TextType::class, array('label' => "BottomBar - CloseButton margin-right"))
            ->add('close_button_width', TextType::class, array('label' => "BottomBar - CloseButton width"))

            //FORM SUBMIT BUTTON
            ->add('save', SubmitType::class, array('label' => "Update element"))

            ->getForm();

        return $form;
    }

    private function chargeElementsStatesFromParameters() {
        $yamlPath = $this->kernel->locateResource('@JspAdminBundle/Resources/data/elements.yml');
        $yamlContent = Yaml::parse(file_get_contents($yamlPath));
        $yamlStates = $yamlContent['states'];

        $this->elementStates = array();
        foreach ($yamlStates as $key => $value) {
            $this->elementStates[$value] = ucfirst($this->translator->trans("mgc.global.{$value}", array(), 'messages', $this->locale));
        }

        $this->elementStates = array_flip($this->elementStates);

    }

    private function chargeElementDesignCssFromParameters() {
        $yamlPath = realpath($this->kernelRootDir.'/../app/Resources/data/css.yml');
        $yamlContent = Yaml::parse(file_get_contents($yamlPath));
        $yamlBackgroundRepeat = $yamlContent['background-repeat'];
        $yamlCursor = $yamlContent['cursor'];
        $yamlTextAlign = $yamlContent['text-align'];

        foreach ($yamlBackgroundRepeat as $key => $value) {
            $this->cssBackgroundRepeat[$value] = $value;
        }

        foreach ($yamlCursor as $key => $value) {
            $this->cssCursor[$value] = $value;
        }

        foreach ($yamlTextAlign as $key => $value) {
            $this->cssTextAlign[$value] = $value;
        }

    }

}