<?php

namespace JSP\AdminBundle\Services;

use Doctrine\ORM\EntityManager;
use JSP\AdminBundle\Services\Mappers\ElementMapper;

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
}