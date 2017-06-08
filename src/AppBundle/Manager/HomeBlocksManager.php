<?php
namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use Psr\Log\InvalidArgumentException;

class HomeBlocksManager {

  /**
   * @var \Doctrine\ORM\EntityManager
   */
  private $entityManager;

  /**
   * HomeBlocksManager constructor.
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
  public function getHomeBlocks()
  {
    return $this->entityManager->getRepository('AppBundle:HomeBlock')
      ->findAllBlocks();
  }

  /**
   * @param $ids
   *
   * @throws \RuntimeException
   * @throws \Doctrine\ORM\ORMInvalidArgumentException
   * @throws \Doctrine\ORM\OptimisticLockException
   * @throws \Psr\Log\InvalidArgumentException
   */
  public function updateHomeBlockPosition(array $ids = [])
  {
    if($ids === null) {
      throw new InvalidArgumentException('Some parameter was not set up');
    }

    if(!count($ids)) {
      throw new InvalidArgumentException('Ids must be an array of values, comma separated');
    }

    foreach($ids as $i => $block_id) {
      $block = $this->entityManager->getRepository('AppBundle:HomeBlock')
            ->findOneBy(['id' => $block_id]);

      if(!$block) {
        throw new \RuntimeException('No block found inside ids array!');
      }

      $block->setPosition($i);
      $this->entityManager->persist($block);
    }

    $this->entityManager->flush();
  }
}