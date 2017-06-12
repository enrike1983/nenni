<?php

namespace AppBundle\Repository;

/**
 * BlockRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BlockRepository extends \Doctrine\ORM\EntityRepository
{
  protected function getBaseQuery()
  {
      return $this->createQueryBuilder('b')
          ->select('b')
          ->orderBy('b.position', 'ASC');
  }

  /**
   * @param $block_group
   *
   * @return array
   */
  public function findBlocks($block_group = null)
  {
      $qb = $this->getBaseQuery();

      if($block_group) {
        $qb->where('b.block_group = :block_group')
          ->setParameter('block_group', $block_group);
      }

      return $qb->getQuery()->getResult();
  }
}