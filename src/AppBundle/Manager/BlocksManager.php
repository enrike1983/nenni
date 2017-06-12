<?php
namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use Psr\Log\InvalidArgumentException;

class BlocksManager {

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
   * @return mixed
   */
  public function getBlocks()
  {
    return $this->entityManager->getRepository('AppBundle:Block')
      ->findAllBlocks();
  }

  /**
   * @param $block_id
   * @param $index
   *
   * @throws \RuntimeException
   * @throws \Doctrine\ORM\ORMInvalidArgumentException
   * @throws \Doctrine\ORM\OptimisticLockException
   * @throws \Psr\Log\InvalidArgumentException
   */
  public function updateBlockPosition($block_id, $index)
  {
    if($block_id === null || $index === null) {
      throw new InvalidArgumentException('Some parameter was not set up');
    }

    $block = $this->entityManager->getRepository('AppBundle:Block')
      ->findOneBy(['id' => $block_id]);

    if(!$block) {
      throw new \RuntimeException('Something bad happened');
    }

    $old_index = $block->getPosition();

    // sposto elemento a nuovo index;
    $block->setPosition($index);
    $this->entityManager->persist($block);
    $this->entityManager->flush();

    // tutti gli elementi fino al vecchio index aumentano di 1 il proprio index
    $blocks = $this->getBlocks();
    foreach ($blocks as $i => $bl) {
      if($i > $index && $i < $old_index) {
        $bl->setPosition($bl->getPosition() + 1);
        $this->entityManager->persist($bl);
        $this->entityManager->flush();
      }
    }
  }
}