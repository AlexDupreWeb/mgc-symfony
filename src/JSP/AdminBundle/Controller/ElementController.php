<?php

namespace JSP\AdminBundle\Controller;

use JSP\AdminBundle\Services\ElementService;
use MGC\CoreBundle\Controller\MGCController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class ElementController extends MGCController {

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
    public function addAction() {
        return $this->render('JspAdminBundle:Element:add.html.twig');
    }

    /**
     * @Route("/jsp/elements/edit/{id}", requirements={"id": "\d+"},  name="jsp_admin_elements_edit")
     */
    public function editAction($id) {
        $element = $this->getDoctrine()->getRepository('JspCoreBundle:Element')->find($id);

        return $this->render('JspAdminBundle:Element:edit.html.twig', array(
            'element' => $element
        ));
    }

}