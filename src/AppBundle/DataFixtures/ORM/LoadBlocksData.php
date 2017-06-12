<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Block;
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

          $manager->persist($home_block);
        }

        $manager->flush();
    }
}