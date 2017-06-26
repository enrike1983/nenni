<?php

namespace AppBundle\Controller;

use AppBundle\Manager\BlocksManager;
use Doctrine\DBAL\Exception\DatabaseObjectNotFoundException;
use Psr\Log\InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use HttpInvalidParamException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SiteController extends Controller
{
  /**
   * @Route("/")
   */
  public function homepageAction()
  {
    $blocks = $this->container->get('app.blocks_manager')->getBlocks(BlocksManager::BLOCK_GROUP_HOME);

    return $this->render(
        'default/home.html.twig',
        array('blocks' => $blocks)
    );
  }

  /**
   * @Route("/news")
   */
  public function newsAction(Request $request)
  {
      $news = $this->container->get('app.news_manager')->getNewsByLocale($request->getLocale());
\Doctrine\Common\Util\Debug::dump($news);
die();
      if(!count($news)) {
        $this->createNotFoundException();
      }

      return $this->render(
          'default/news.html.twig',
          [
              'news' => $news
          ]
      );
  }

  /**
   * @Route("/news/{news_slug}", requirements={
   *     "news_slug": "^[a-z0-9-\/]*$"
   * })
   *
   * @param $news_slug
   *
   * @return \Symfony\Component\HttpFoundation\Response
   */
  public function singleNewsAction($news_slug)
  {
    //cerca la news dato lo slug. Se esiste ok altrimenti manda a 404

    return $this->render(
        'default/single-news.html.twig'
    );
  }

  /**
   * @Route("/vini")
   */
  public function viniAction()
  {
    $blocks = $this->container->get('app.blocks_manager')->getBlocks(BlocksManager::BLOCK_GROUP_VINI);

    return $this->render(
        'default/vini.html.twig',
        array('blocks' => $blocks)
    );
  }

  /**
   * @Route("/le-vigne")
   */
  public function leVigneAction()
  {
    return $this->render(
        'default/le-vigne.html.twig'
    );
  }

  /**
   * @Route("/la-tenuta")
   */
  public function laTenutaAction()
  {
    return $this->render(
        'default/la-tenuta.html.twig'
    );
  }
}
