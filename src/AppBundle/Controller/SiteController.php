<?php

namespace AppBundle\Controller;

use AppBundle\Manager\BlocksManager;
use AppBundle\Manager\NewsManager;
use Doctrine\DBAL\Exception\DatabaseObjectNotFoundException;
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
     * @Route("/", name="home")
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homepageAction(Request $request)
    {
        $blocks = $this->container->get('app.blocks_manager')->getBlocks(
          BlocksManager::BLOCK_GROUP_HOME
        );

        $news = $this->container->get('app.news_manager')->getNewsByLocale(
          $request->getLocale(),
          NewsManager::HOME_NEWS_LIMIT
        );

        $wine = $this->container->get('app.blocks_manager')->getFirstBlock(
          BlocksManager::BLOCK_GROUP_VINI
        );

        return $this->render(
          'default/home.html.twig',
          [
            'blocks' => $blocks,
            'news' => $news,
            'wine' => $wine,
          ]
        );
    }

    /**
     * @Route("/la-tenuta", name="la-tenuta")
     */
    public function laTenutaAction()
    {
        $blocks = $this->container->get('app.blocks_manager')->getBlocks(
          BlocksManager::BLOCK_GROUP_LA_TENUTA
        );

        return $this->render(
          'default/la-tenuta.html.twig',
          [
            'blocks' => $blocks,
          ]
        );
    }

    /**
     * @Route("/le-vigne", name="le-vigne")
     */
    public function leVigneAction()
    {
        $blocks = $this->container->get('app.blocks_manager')->getBlocks(
          BlocksManager::BLOCK_GROUP_VIGNE
        );

        return $this->render(
          'default/le-vigne.html.twig',
          [
            'blocks' => $blocks,
          ]
        );
    }

    /**
     * @Route("/il-metodo-nenni", name="il-metodo-nenni")
     */
    public function ilMetodoNenniAction()
    {
        $blocks = $this->container->get('app.blocks_manager')->getBlocks(
          BlocksManager::BLOCK_GROUP_IL_METODO_NENNI
        );

        return $this->render(
          'default/il-metodo-nenni.html.twig',
          [
            'blocks' => $blocks,
          ]
        );
    }

    /**
     * @Route("/news", name="news_list")
     */
    public function newsAction(Request $request)
    {
        $news = $this->container->get('app.news_manager')->getNewsByLocale(
          $request->getLocale()
        );

        if (!count($news)) {
            $this->createNotFoundException();
        }

        return $this->render(
          'default/news.html.twig',
          [
            'news' => $news,
          ]
        );
    }

    /**
     * @Route("/news/{news_url}", requirements={
     *     "news_url": "^[a-z0-9-\/]*$"
     * }, name="single_news")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param $news_url
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function singleNewsAction(Request $request, $news_url)
    {
        //cerca la news dato lo slug. Se esiste ok altrimenti manda a 404
        $news = $this->container->get('app.news_manager')
          ->getSingleNewsByUrlAndLocale(
            $news_url,
            $request->getLocale()
          );

        if (!$news) {
            $this->createNotFoundException();
        }

        return $this->render(
          'default/single-news.html.twig',
          [
            'news' => $news,
          ]
        );
    }

    /**
     * @Route("/vini", name="vini")
     */
    public function viniAction()
    {
        $blocks = $this->container->get('app.blocks_manager')->getBlocks(
          BlocksManager::BLOCK_GROUP_VINI
        );

        return $this->render(
          'default/vini.html.twig',
          [
            'blocks' => $blocks,
          ]
        );
    }

    /**
     * @Route("/contatti", name="contatti")
     */
    public function contattiAction()
    {
        return $this->render(
          'default/contatti.html.twig'
        );
    }

    /**
     * Team block partial
     *
     * @param $team_block_title
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderTeamBlockAction($team_block_title)
    {
        $team_members = $this->container->get('app.blocks_manager')->getBlocks(
          BlocksManager::BLOCK_GROUP_TEAM
        );

        return $this->render(
             'default/partials/_team.html.twig',
             [
               'team_block_title' => $team_block_title,
               'team_members' => $team_members
             ]
        );
    }

    /**
     * DEBUG ROUTE
     *
     * @Route("/list-modules")
     */
    public function listModulesAction()
    {
        return $this->render(
          'default/list-modules.html.twig'
        );
    }
}
