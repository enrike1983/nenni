<?php

namespace AppBundle\Controller;

use Psr\Log\InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use HttpInvalidParamException;

class SiteController extends Controller
{
  /**
   * @Route("/")
   */
  public function homepageAction()
  {
    $blocks = $this->container->get('app.home_blocks_manager')->getHomeBlocks();

    return $this->render(
        'default/home.html.twig',
        array('blocks' => $blocks)
    );
  }

  /**
   * @Route("/news")
   */
  public function newsAction()
  {
    return $this->render(
        'default/news.html.twig'
    );
  }

  /**
   * @Route("/news/single-news")
   */
  public function singleNewsAction()
  {
    return $this->render(
        'default/single-news.html.twig'
    );
  }

  /**
   * @Route("/vini")
   */
  public function viniAction()
  {
    return $this->render(
        'default/vini.html.twig'
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

  /**
   * @Route("/update-home-block-sort", name="update_home_block_sort")
   * @param \Symfony\Component\HttpFoundation\Request $request
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   * @throws \LogicException
   */
  public function updateHomeBlockSortAction(Request $request)
  {
    $block_id = $request->request->get('home_block_id');
    $block_index = $request->request->get('index');

    try {
      $this->container->get('app.home_blocks_manager')->updateHomeBlockPosition(
        $block_id,
        $block_index
      );
      $message = 'Sort updated!';

    } catch (InvalidArgumentException $e) {
      $message = $e->getMessage();
    }

    return $this->json(['data' => [
      'message' => $message
    ]]);
  }
}
