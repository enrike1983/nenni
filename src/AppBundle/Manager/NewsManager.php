<?php
namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use Psr\Log\InvalidArgumentException;

class NewsManager {

    const HOME_NEWS_LIMIT = 4;

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
    * @param int $limit
    *
    * @return mixed
    */
    public function getNewsByLocale($locale, $limit = null)
    {
        return $this->entityManager->getRepository('AppBundle:News')
          ->findNewsByLocale($locale, $limit);
    }

    /**
    * @param $slug
    *
    * @param $locale
    *
    * @return mixed
    */
    public function getSingleNewsByUrlAndLocale($slug, $locale)
    {
        return $this->entityManager->getRepository('AppBundle:News')
          ->findSingleNewsByUrlAndLocale($slug, $locale);
    }
}