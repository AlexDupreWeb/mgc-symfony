<?php

namespace JSP\AdminBundle\Controller;

use JSP\AdminBundle\Dto\Element\ElementForm;
use JSP\AdminBundle\Services\ElementService;
use JSP\AdminBundle\Services\Mappers\ElementMapper;
use JSP\CoreBundle\Entity\Element;
use MGC\CoreBundle\Controller\MGCController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;

class ElementController extends MGCController {

    /**
     * @var ElementMapper
     */
    private $elementMapper;

    /**
     * @var ElementService
     */
    private $elementService;

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null) {
        parent::setContainer($container);
        $this->elementService = $this->get('jsp.admin.service.element');
    }

    /**
     * @Route("/jsp/elements", name="jsp_admin_elements")
     */
    public function indexAction(Request $request) {
        $elements = $this->elementService->getAllElements();

        $txt_element = $this->get('translator')->trans('jsp.global.element', array(), 'messages', $request->getLocale());

        return $this->render('JspAdminBundle:Element:index.html.twig', array(
            'elements' => $elements,
            'txt_element' => $txt_element
        ));
    }

    /**
     * @Route("/jsp/elements/add", name="jsp_admin_elements_add")
     */
    public function addAction(Request $request) {
        $this->elementService = $this->get('jsp.admin.service.element');

        $kernel = $this->container->get('kernel');
        $yamlPath = $kernel->locateResource('@JspAdminBundle/Resources/data/elements.yml');
        $yamlContent = Yaml::parse(file_get_contents($yamlPath));
        $yamlStates = $yamlContent['states'];

        $states_options = array();
        foreach ($yamlStates as $key => $value) {
            $states_options[$value] = ucfirst( $this->get('translator')->trans("mgc.global.{$value}", array(), 'messages', $request->getLocale()) );
        }
        $states_options = array_flip($states_options);

        $now = new \DateTime();

        $elementFromDto = new ElementForm();
        $elementFromDto->setName("Nouvel element...");
        $elementFromDto->setState('draft');
        $elementFromDto->setDateBegin($now->format('d/m/Y H:i:s'));
        $elementFromDto->setDateEnd($now->format('d/m/Y H:i:s'));

        /** @var Form $form */
        $form = $this->createFormBuilder($elementFromDto)
            ->add('name', TextType::class, array('label' => "Create element"))
            ->add('date_begin', TextType::class, array('label' => "Create element"))
            ->add('date_end', TextType::class, array('label' => "Create element"))
            ->add('state', ChoiceType::class, array(
                'label' => "Create element",
                'placeholder' => false,
                'choices' => $states_options
            ))
            ->add('active', CheckboxType::class, array(
                'label' => "Create element",
                'required' => false
            ))
            ->add('save', SubmitType::class, array('label' => "Create element"))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isSubmitted() && $form->isValid()) {
                $element = $this->elementService->createElementWithFormDto($form->getData());

                return $this->redirectToRoute('jsp_admin_elements_edit', array('id' => $element->getId()));
            }
        }

        return $this->render('JspAdminBundle:Element:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/jsp/elements/edit/{id}", requirements={"id": "\d+"},  name="jsp_admin_elements_edit")
     */
    public function editAction($id, Request $request) {
        $this->elementService = $this->get('jsp.admin.service.element');
        $this->elementMapper = $this->get('jsp.admin.mapper.element');

        $element = $this->getDoctrine()->getRepository('JspCoreBundle:Element')->find($id);
        $elementForm = $this->elementMapper->entityToDtoForm($element);


        $kernel = $this->container->get('kernel');
        $yamlPath = $kernel->locateResource('@JspAdminBundle/Resources/data/elements.yml');
        $yamlContent = Yaml::parse(file_get_contents($yamlPath));
        $yamlStates = $yamlContent['states'];

        $states_options = array();
        foreach ($yamlStates as $key => $value) {
            $states_options[$value] = ucfirst( $this->get('translator')->trans("mgc.global.{$value}", array(), 'messages', $request->getLocale()) );
        }
        $states_options = array_flip($states_options);

        $form = $this->createFormBuilder($elementForm)
            ->add('name', TextType::class, array('label' => "Update element"))
            ->add('date_begin', TextType::class, array('label' => "Update element"))
            ->add('date_end', TextType::class, array('label' => "Update element"))
            ->add('state', ChoiceType::class, array(
                'label' => "Update element",
                'placeholder' => false,
                'choices' => $states_options
            ))
            ->add('active', CheckboxType::class, array(
                'label' => "Update element",
                'required' => false
            ))
            ->add('save', SubmitType::class, array('label' => "Update element"))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isSubmitted() && $form->isValid()) {
                $this->elementService->updateElementWithFormDto($form->getData());

                return $this->redirectToRoute('jsp_admin_elements_edit', array('id' => $element->getId()));
            }
        }

        return $this->render('JspAdminBundle:Element:edit.html.twig', array(
            'element' => $element,
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/jsp/elements/delete/{id}", requirements={"id": "\d+"},  name="jsp_admin_elements_delete")
     */
    public function deleteAction($id) {

    }

    /**
     * @Route("/jsp/elements/stop/{id}", requirements={"id": "\d+"},  name="jsp_admin_elements_stop")
     */
    public function stopAction($id) {

    }

}