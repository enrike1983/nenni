<?php

namespace AppBundle\Controller;

use AppBundle\Manager\BlocksManager;
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
    $blocks = $this->container->get('app.home_blocks_manager')->getBlocks(BlocksManager::BLOCK_GROUP_HOME);

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
    $blocks = $this->container->get('app.home_blocks_manager')->getBlocks(BlocksManager::BLOCK_GROUP_VINI);

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

  /**
   * @Route("/update-block-sort", name="update_block_sort")
   * @param \Symfony\Component\HttpFoundation\Request $request
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   * @throws \LogicException
   */
  public function updateBlockSortAction(Request $request)
  {
    $ids_string = $request->request->get('ids');
    $ids = explode(',', $ids_string);

    try {
      $this->container->get('app.home_blocks_manager')->updateBlockPosition(
        $ids
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
