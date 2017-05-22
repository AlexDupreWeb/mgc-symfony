<?php

namespace JSP\AdminBundle\Services;

use Doctrine\ORM\EntityManager;
use JSP\AdminBundle\Dto\Element\ElementForm;
use JSP\AdminBundle\Services\Mappers\ElementMapper;
use JSP\CoreBundle\Entity\Element;

class ElementService {

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var ElementRepository
     */
    private $elementRepository;

    /**
     * @var ElementMapper
     */
    private $elementMapper;

    /**
     * ElementService constructor.
     * @param EntityManager $em
     * @param ElementMapper $elementMapper
     */
    public function __construct(EntityManager $em, ElementMapper $elementMapper) {
        $this->em = $em;
        $this->elementMapper = $elementMapper;

        $this->elementRepository = $em->getRepository('JspCoreBundle:Element');
    }

    /**
     * @return array|void
     */
    public function getAllElements() {
        $elements = $this->elementRepository->findAll();
        $elements = $this->elementMapper->entitiesListToDtoList($elements);
        return $elements;
    }

    public function createElementWithFormDto(ElementForm $elementForm) {
        $now = new \DateTime();

        $elementForm
            ->setDateCreated($now)
            ->setDateUpdated($now)
        ;

        $element = $this->elementMapper->DtoFormToEntity($elementForm);

        $this->em->persist($element);
        $this->em->flush();

        return $element;
    }

    public function updateElement(Element $element) {
        $now = new \DateTime();

        $element->setDateUpdated($now);

        $this->em->merge($element);
        $this->em->flush();
    }

    public function updateElementWithFormDto(ElementForm $elementForm) {
        $element = $this->elementMapper->DtoFormToEntity($elementForm);

        $now = new \DateTime();

        $element->setDateUpdated($now);

        $this->em->merge($element);
        $this->em->flush();
    }

    public function deleteElement(Element $element) {
        $this->em->remove($element);
        $this->em->flush();
    }
}