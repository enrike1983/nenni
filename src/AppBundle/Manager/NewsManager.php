<?php
namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use Psr\Log\InvalidArgumentException;

class NewsManager {

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
   * @param $locale
   *
   * @return mixed
   *
   */
  public function getNewsByLocale($locale)
  {
    return $this->entityManager->getRepository('AppBundle:News')
      ->findNewsByLocale($locale);
  }
}