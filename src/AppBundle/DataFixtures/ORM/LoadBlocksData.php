<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Block;
use AppBundle\Entity\BlockTranslation;
use AppBundle\Manager\BlocksManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadBlocksData extends AbstractFixture
{

    public function getSiteStructure()
    {
        return [
          [
            'title' => [
              'it' => 'Eccellente di natura dal 1272',
              'en' => 'excellent by nature since 1272',
            ],
            'subtitle' => [
              'it' => '',
              'en' => '',
            ],
            'content' => [
              'it' => '<h2></h2>',
              'en' => '<h2></h2>',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_intro-home.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
          ],
          [
            'title' => [
              'it' => 'Lorem Ipsum Blocco 1',
              'en' => 'EN Lorem Ipsum Blocco 1',
            ],
            'subtitle' => [
              'it' => 'Lorem Ipsum Blocco 1',
              'en' => 'EN Lorem Ipsum Blocco 1',
            ],
            'content' => [
              'it' => '<h2>Lorem Ipsum 1</h2>',
              'en' => 'EN <h2>Lorem Ipsum 1</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_imageleft_textright.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
          ],
          [
            'title' => [
              'it' => 'Lorem Ipsum Blocco 2',
              'en' => 'EN Lorem Ipsum Blocco 2',
            ],
            'subtitle' => [
              'it' => 'Lorem Ipsum Blocco 2',
              'en' => 'EN Lorem Ipsum Blocco 2',
            ],
            'content' => [
              'it' => '<h2>Lorem Ipsum 2</h2>',
              'en' => 'EN <h2>Lorem Ipsum 2</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_textleft_imageright.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
          ],
          [
            'title' => [
              'it' => 'Lorem Ipsum Blocco 3',
              'en' => 'EN Lorem Ipsum Blocco 3',
            ],
            'subtitle' => [
              'it' => 'Lorem Ipsum Blocco 3',
              'en' => 'EN Lorem Ipsum Blocco 3',
            ],
            'content' => [
              'it' => '<h2>Lorem Ipsum 3</h2>',
              'en' => 'EN <h2>Lorem Ipsum 3</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_videofullwidth.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
          ],
          [
            'title' => [
              'it' => 'Lorem Ipsum Blocco 4',
              'en' => 'EN Lorem Ipsum Blocco 4',
            ],
            'subtitle' => [
              'it' => 'Lorem Ipsum Blocco 4',
              'en' => 'EN Lorem Ipsum Blocco 4',
            ],
            'content' => [
              'it' => '<h2>Lorem Ipsum 4</h2>',
              'en' => 'EN <h2>Lorem Ipsum 4</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_textleft_videoright.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
          ],
          [
            'title' => [
              'it' => 'Lorem Ipsum Blocco 4',
              'en' => 'EN Lorem Ipsum Blocco 4',
            ],
            'subtitle' => [
              'it' => 'Lorem Ipsum Blocco 4',
              'en' => 'EN Lorem Ipsum Blocco 4',
            ],
            'content' => [
              'it' => '<h2>Lorem Ipsum 4</h2>',
              'en' => 'EN <h2>Lorem Ipsum 4</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_full_text--light.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
          ],
          [
            'title' => [
              'it' => 'Lorem Ipsum Blocco 5',
              'en' => 'EN Lorem Ipsum Blocco 5',
            ],
            'subtitle' => [
              'it' => 'Lorem Ipsum Blocco 5',
              'en' => 'EN Lorem Ipsum Blocco 5',
            ],
            'content' => [
              'it' => '<h2>Lorem Ipsum 5</h2>',
              'en' => 'EN <h2>Lorem Ipsum 5</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_full_text--dark.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
          ],
            #####################
            ##### LA TENUTA #####
            #####################
          [
            'title' => [
              'it' => 'Intro',
              'en' => 'EN Intro',
            ],
            'subtitle' => [
              'it' => 'Intro',
              'en' => 'EN Intro',
            ],
            'content' => [
              'it' => '<h2>Intro</h2>',
              'en' => '<h2>EN Intro</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_intro.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_LA_TENUTA,
          ],
          [
            'title' => [
              'it' => 'Block Group La Tenuta 1',
              'en' => 'EN Block Group La Tenuta 1',
            ],
            'subtitle' => [
              'it' => 'Block Group La Tenuta 1',
              'en' => 'EN Block Group La Tenuta 1',
            ],
            'content' => [
              'it' => '<h2>Block Group La Tenuta 4</h2>',
              'en' => 'EN <h2>Block Group La Tenuta 4</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_videofullwidth.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_LA_TENUTA,
          ],
          [
            'title' => [
              'it' => 'Block Group La Tenuta 2',
              'en' => 'EN Block Group La Tenuta 2',
            ],
            'subtitle' => [
              'it' => 'Block Group La Tenuta 2',
              'en' => 'EN Block Group La Tenuta 2',
            ],
            'content' => [
              'it' => '<h2>Block Group La Tenuta 2</h2>',
              'en' => 'EN <h2>Block Group La Tenuta 2</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_full_text--light.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_LA_TENUTA,
          ],
          [
            'title' => [
              'it' => 'Block Group La Tenuta 3',
              'en' => 'EN Block Group La Tenuta 3',
            ],
            'subtitle' => [
              'it' => 'Block Group La Tenuta 3',
              'en' => 'EN Block Group La Tenuta 3',
            ],
            'content' => [
              'it' => '<h2>Block Group La Tenuta 3</h2>',
              'en' => 'EN <h2>Block Group La Tenuta 3</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_full_text--dark.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_LA_TENUTA,
          ],
          [
            'title' => [
              'it' => 'Lorem Ipsum La Tenuta 4',
              'en' => 'EN Lorem Ipsum La Tenuta 4',
            ],
            'subtitle' => [
              'it' => 'Lorem Ipsum La Tenuta 4',
              'en' => 'EN Lorem Ipsum La Tenuta 4',
            ],
            'content' => [
              'it' => '<h2>Lorem Ipsum 4</h2>',
              'en' => 'EN <h2>Lorem Ipsum 4</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_imageleft_textright.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_LA_TENUTA,
          ],
          [
            'title' => [
              'it' => 'Lorem Ipsum La Tenuta 5',
              'en' => 'EN Lorem Ipsum La Tenuta 5',
            ],
            'subtitle' => [
              'it' => 'Lorem Ipsum La Tenuta 5',
              'en' => 'EN Lorem Ipsum La Tenuta 5',
            ],
            'content' => [
              'it' => '<h2>Lorem Ipsum 5</h2>',
              'en' => 'EN <h2>Lorem Ipsum 5</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_textleft_imageright.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_LA_TENUTA,
          ],

            #####################
            ###### LE VIGNE #####
            #####################
          [
            'title' => [
              'it' => 'Intro',
              'en' => 'EN Intro',
            ],
            'subtitle' => [
              'it' => 'Intro',
              'en' => 'EN Intro',
            ],
            'content' => [
              'it' => '<h2>Intro</h2>',
              'en' => 'EN <h2>Intro</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_intro.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VIGNE,
          ],
          [
            'title' => [
              'it' => 'Block Group Vigne 1',
              'en' => 'EN Block Group Vigne 1',
            ],
            'subtitle' => [
              'it' => 'Block Group Vigne 1',
              'en' => 'EN Block Group Vigne 1',
            ],
            'content' => [
              'it' => '<h2>Block Group Vigne 4</h2>',
              'en' => 'EN <h2>Block Group Vigne 4</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_videofullwidth.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VIGNE,
          ],
          [
            'title' => [
              'it' => 'Block Group Vigne 2',
              'en' => 'EN Block Group Vigne 2',
            ],
            'subtitle' => [
              'it' => 'Block Group Vigne 2',
              'en' => 'EN Block Group Vigne 2',
            ],
            'content' => [
              'it' => '<h2>Block Group Vigne 2</h2>',
              'en' => 'EN <h2>Block Group Vigne 2</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_videofullwidth.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VIGNE,
          ],
          [
            'title' => [
              'it' => 'Block Group Vigne 3',
              'en' => 'EN Block Group Vigne 3',
            ],
            'subtitle' => [
              'it' => 'Block Group Vigne 3',
              'en' => 'EN Block Group Vigne 3',
            ],
            'content' => [
              'it' => '<h2>Block Group Vigne 3</h2>',
              'en' => 'EN <h2>Block Group Vigne 3</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_videofullwidth.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VIGNE,
          ],
          [
            'title' => [
              'it' => 'Il Metodo Nenni',
              'en' => 'EN Il Metodo Nenni',
            ],
            'subtitle' => [
              'it' => 'Il Metodo Nenni',
              'en' => 'EN Il Metodo Nenni',
            ],
            'content' => [
              'it' => '<h2>Il Metodo Nenni</h2>',
              'en' => 'EN <h2>Il Metodo Nenni</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_full_text--light.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_IL_METODO_NENNI,
          ],
            #####################
            ###### I VINI #######
            #####################
          [
            'title' => [
              'it' => 'VIno 1',
              'en' => 'EN VIno 1',
            ],
            'subtitle' => [
              'it' => 'VIno 1',
              'en' => 'EN VIno 1',
            ],
            'content' => [
              'it' => '<h2>Lorem Ipsum 1</h2>',
              'en' => 'EN <h2>Lorem Ipsum 1</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_wine-sheet.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VINI,
          ],
          [
            'title' => [
              'it' => 'VIno 2',
              'en' => 'EN VIno 2',
            ],
            'subtitle' => [
              'it' => 'VIno 2',
              'en' => 'EN VIno 2',
            ],
            'content' => [
              'it' => '<h2>Lorem Ipsum 2</h2>',
              'en' => 'EN <h2>Lorem Ipsum 2</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_wine-sheet.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VINI,
          ],
          [
            'title' => [
              'it' => 'VIno 3',
              'en' => 'EN VIno 3',
            ],
            'subtitle' => [
              'it' => 'VIno 3',
              'en' => 'EN VIno 3',
            ],
            'content' => [
              'it' => '<h3>Lorem Ipsum 3</h3>',
              'en' => 'EN <h2>Lorem Ipsum 2</h2>',
            ],
            'link' => [
              'it' => 'www.google.com',
              'en' => 'www.google.com',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_wine-sheet.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VINI,
          ],
        ];
    }

    protected function createTranslations($translations, $locale, $manager)
    {
        foreach ($translations as $key => $block) {

            $translation = new BlockTranslation();
            $translation->setTitle($block['title'][$locale]);
            $translation->setSubtitle($block['subtitle'][$locale]);
            $translation->setContent($block['content'][$locale]);
            $translation->setLink($block['link'][$locale]);
            $translation->setLinkLabel($block['link_label'][$locale]);
            $translation->setLocale($locale);
            $translation->setTranslatable($this->getReference($key));

            $manager->persist($translation);
            $manager->flush();
        }
    }

    public function createSiteStructure($home_blocks, $manager)
    {
        foreach ($home_blocks as $i => $block) {
            $home_block = new Block();
            $home_block->setTemplate($block['template']);
            $home_block->setPosition($i);
            $home_block->setBlockGroup($block['block_group']);

            $this->addReference($i, $home_block);

            $manager->persist($home_block);
        }

        $manager->flush();
    }

    public function load(ObjectManager $manager)
    {
        $translations = $this->getSiteStructure();

        $this->createSiteStructure($translations, $manager);
        $this->createTranslations($translations, 'it', $manager);
        $this->createTranslations($translations, 'en', $manager);
    }
}