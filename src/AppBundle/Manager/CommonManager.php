<?php
namespace AppBundle\Manager;

use AppBundle\Entity\MenuItem;
use Doctrine\ORM\EntityManager;
use Psr\Log\InvalidArgumentException;

class CommonManager
{
    /**
    * @var \Doctrine\ORM\EntityManager
    */
    private $entityManager;

    /**
    * BlocksManager constructor.
    *
    * @param \Doctrine\ORM\EntityManager $entityManager
    */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param array $ids
     *
     * @param string $object_class
     */
    public function updateElementsPosition(array $ids = [], $object_class = '')
    {
        if($ids === null) {
            throw new InvalidArgumentException('Some parameter was not set up');
        }

        if(!count($ids)) {
            throw new InvalidArgumentException('Ids must be an array of values, comma separated');
        }

        foreach($ids as $i => $element_id) {
            $element = $this->entityManager->getRepository($object_class)
                ->findOneBy(['id' => $element_id]);

            if(!$element) {
            throw new \RuntimeException('No element found inside ids array!');
            }

            $element->setPosition($i);
            $this->entityManager->persist($element);
        }

        $this->entityManager->flush();
    }

    /**
     * @return array
     */
    public function getMenuItems()
    {
        return $this->entityManager->getRepository(MenuItem::class)
            ->findMenuItems();
    }
}