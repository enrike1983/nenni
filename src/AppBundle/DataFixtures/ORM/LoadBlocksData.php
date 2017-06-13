<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Block;
use AppBundle\Manager\BlocksManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadBlocksData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $home_blocks = [
          [
            'title' => 'Lorem Ipsum Blocco 1',
            'subtitle' => 'lorem ipsum sic dolorem',
            'content' => '<h2>Lorem Ipsum 1</h2>',
            'template' => 'default/_imageleft_textright.html.twig',
            'link' => 'www.google.com',
            'link_label' => 'discover more'
          ],
          [
            'title' => 'Lorem Ipsum Blocco 2',
            'subtitle' => 'lorem ipsum sic dolorem',
            'content' => '<h2>Lorem Ipsum 2</h2>',
            'template' => 'default/_textleft_imageright.html.twig',
            'link' => 'www.google.com',
            'link_label' => 'discover more'
          ],
          [
            'title' => 'Lorem Ipsum Blocco 3',
            'subtitle' => 'lorem ipsum sic dolorem',
            'content' => '<h2>Lorem Ipsum 3</h2>',
            'template' => 'default/_videofullwidth.html.twig',
            'link' => 'www.google.com',
            'link_label' => 'discover more'
          ],
          [
            'title' => 'Lorem Ipsum Blocco 4',
            'subtitle' => 'lorem ipsum sic dolorem',
            'content' => '<h2>Lorem Ipsum 4</h2>',
            'template' => 'default/_textleft_videoright.html.twig',
            'link' => 'www.google.com',
            'link_label' => 'discover more'
          ],
          [
            'title' => 'Lorem Ipsum Blocco 5',
            'subtitle' => 'lorem ipsum sic dolorem',
            'content' => '<h2>Lorem Ipsum 4</h2>',
            'template' => 'default/_full_text.html.twig',
            'link' => 'www.google.com',
            'link_label' => 'discover more'
          ]
        ];

        foreach ($home_blocks as $i => $block) {
          $home_block = new Block();
          $home_block->setTitle($block['title']);
          $home_block->setSubtitle($block['subtitle']);
          $home_block->setContent($block['content']);
          $home_block->setTemplate($block['template']);
          $home_block->setPosition($i);
          $home_block->setLink($block['link']);
          $home_block->setLinkLabel($block['link_label']);
          $home_block->setBlockGroup(BlocksManager::BLOCK_GROUP_HOME);

          $manager->persist($home_block);
        }


        $wine_blocks = [
          [
            'title' => 'Vino 1',
            'subtitle' => 'lorem ipsum sic dolorem',
            'content' => '<h2>Lorem Ipsum 1</h2>',
            'template' => 'default/_wine-sheet.html.twig',
            'link' => 'www.google.com',
            'link_label' => 'discover more'
          ],
          [
            'title' => 'Vino 2',
            'subtitle' => 'lorem ipsum sic dolorem',
            'content' => '<h2>Lorem Ipsum 2</h2>',
            'template' => 'default/_wine-sheet.html.twig',
            'link' => 'www.google.com',
            'link_label' => 'discover more'
          ],
          [
            'title' => 'Vino 3',
            'subtitle' => 'lorem ipsum sic dolorem',
            'content' => '<h2>Lorem Ipsum 3</h2>',
            'template' => 'default/_wine-sheet.html.twig',
            'link' => 'www.google.com',
            'link_label' => 'discover more'
          ],
        ];

        foreach ($wine_blocks as $i => $block) {
          $wine_block = new Block();
          $wine_block->setTitle($block['title']);
          $wine_block->setSubtitle($block['subtitle']);
          $wine_block->setContent($block['content']);
          $wine_block->setTemplate($block['template']);
          $wine_block->setPosition($i);
          $wine_block->setLink($block['link']);
          $wine_block->setLinkLabel($block['link_label']);
          $wine_block->setBlockGroup(BlocksManager::BLOCK_GROUP_VINI);

          $manager->persist($wine_block);
        }

        $manager->flush();
    }
}