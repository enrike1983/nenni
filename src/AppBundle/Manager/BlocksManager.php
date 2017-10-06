<?php
namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use Psr\Log\InvalidArgumentException;

class BlocksManager {

    const BLOCK_GROUP_HOME = 'home';
    const BLOCK_GROUP_VINI = 'vini';
    const BLOCK_GROUP_VIGNE = 'vigne';
    const BLOCK_GROUP_LA_TENUTA = 'la-tenuta';
    const BLOCK_GROUP_IL_METODO_NENNI = 'il-metodo-nenni';
    const BLOCK_GROUP_TEAM = 'team';
    const BLOCK_GROUP_CONTATTI = 'contatti';

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
    * @param $block_group
    *
    * @return mixed
    */
    public function getBlocks($block_group)
    {
        return $this->entityManager->getRepository('AppBundle:Block')
          ->findBlocks($block_group);
    }

    public function getFirstBlock($block_group)
    {
      return $this->entityManager->getRepository('AppBundle:Block')
        ->findFirstBlock($block_group);
    }
}