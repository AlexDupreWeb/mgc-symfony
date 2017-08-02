<?php

namespace JSP\AdminBundle\Services;

use Doctrine\ORM\EntityManager;
use JMS\Serializer\Serializer;
use JSP\AdminBundle\Dto\Element\ElementForm;
use JSP\AdminBundle\Services\Mappers\ElementMapper;
use JSP\CoreBundle\Entity\Element;
use JSP\CoreBundle\Repository\ElementRepository;

class ElementService {

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @var ElementMapper
     */
    private $elementMapper;

    /**
     * @var ElementRepository
     */
    private $elementRepository;

    /**
     * ElementService constructor.
     * @param EntityManager $em
     * @param ElementMapper $elementMapper
     */
    public function __construct(EntityManager $em, Serializer $serializer,ElementMapper $elementMapper) {
        $this->em = $em;
        $this->serializer = $serializer;
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

    /**
     * @param Element $element
     * @param string $type
     * @param string $json
     */
    public function updateElementData(Element $element, $type, $json) {
        $now = new \DateTime();

        $element->setData($type.'|'.$json);
        $element->setDateUpdated($now);

        $this->em->merge($element);
        $this->em->flush();
    }

    public function deleteElement(Element $element) {
        $this->em->remove($element);
        $this->em->flush();
    }

    /**
     * @param array $array
     * @return string
     */
    public function serializeToJson($array) {
        return $this->serializer->serialize($array, 'json');
    }

    /**
     * @param string $json
     * @param string $namespace
     * @return object
     */
    public function deserializeJsonToObject($json, $namespace) {
        return $this->serializer->deserialize($json, $namespace, 'json');
    }

    public function deserializeJsonFromElementDataToObject($json) {
        $namespace = $json_simplified = '';

        if(preg_match("#^popin\|(.*)#i", $json)) {
            $json_simplified = str_replace('popin|', '', $json);
            $namespace = 'JSP\AdminBundle\Dto\Element\Popin';

        } elseif(preg_match("#^bottombar\|(.*)#i", $json)) {
            $json_simplified = str_replace('bottombar|', '', $json);
            $namespace = 'JSP\AdminBundle\Dto\Element\BottomBar';

        }

        if(!empty($namespace)) {
            return $this->deserializeJsonToObject($json_simplified, $namespace);
        }

        return null;
    }
}