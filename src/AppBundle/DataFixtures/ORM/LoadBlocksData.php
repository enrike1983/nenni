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
                  'it' => 'Lorem Ipsum Blocco 1',
                  'en' => 'EN Lorem Ipsum Blocco 1'
                ],
                'subtitle' => [
                  'it' => 'Lorem Ipsum Blocco 1',
                  'en' => 'EN Lorem Ipsum Blocco 1'
                ],
                'content' => [
                  'it' => '<h2>Lorem Ipsum 1</h2>',
                  'en' => 'EN <h2>Lorem Ipsum 1</h2>',
                ],
                'link' => [
                  'it' => 'www.google.com',
                  'en' => 'www.google.com'
                ],
                'link_label' => [
                  'it' => 'scopri di piu',
                  'en' => 'discover more'
                ],
                'template' => 'default/_imageleft_textright.html.twig',
                'block_group' => BlocksManager::BLOCK_GROUP_HOME
            ],
            [
                'title' => [
                  'it' => 'Lorem Ipsum Blocco 2',
                  'en' => 'EN Lorem Ipsum Blocco 2'
                ],
                'subtitle' => [
                  'it' => 'Lorem Ipsum Blocco 2',
                  'en' => 'EN Lorem Ipsum Blocco 2'
                ],
                'content' => [
                  'it' => '<h2>Lorem Ipsum 2</h2>',
                  'en' => 'EN <h2>Lorem Ipsum 2</h2>',
                ],
                'link' => [
                  'it' => 'www.google.com',
                  'en' => 'www.google.com'
                ],
                'link_label' => [
                  'it' => 'scopri di piu',
                  'en' => 'discover more'
                ],
                'template' => 'default/_textleft_imageright.html.twig',
                'block_group' => BlocksManager::BLOCK_GROUP_HOME
            ],
            [
                'title' => [
                  'it' => 'Lorem Ipsum Blocco 3',
                  'en' => 'EN Lorem Ipsum Blocco 3'
                ],
                'subtitle' => [
                  'it' => 'Lorem Ipsum Blocco 3',
                  'en' => 'EN Lorem Ipsum Blocco 3'
                ],
                'content' => [
                  'it' => '<h2>Lorem Ipsum 3</h2>',
                  'en' => 'EN <h2>Lorem Ipsum 3</h2>',
                ],
                'link' => [
                  'it' => 'www.google.com',
                  'en' => 'www.google.com'
                ],
                'link_label' => [
                  'it' => 'scopri di piu',
                  'en' => 'discover more'
                ],
                'template' => 'default/_videofullwidth.html.twig',
                'block_group' => BlocksManager::BLOCK_GROUP_HOME
            ],
            [
                'title' => [
                  'it' => 'Lorem Ipsum Blocco 4',
                  'en' => 'EN Lorem Ipsum Blocco 4'
                ],
                'subtitle' => [
                  'it' => 'Lorem Ipsum Blocco 4',
                  'en' => 'EN Lorem Ipsum Blocco 4'
                ],
                'content' => [
                  'it' => '<h2>Lorem Ipsum 4</h2>',
                  'en' => 'EN <h2>Lorem Ipsum 4</h2>',
                ],
                'link' => [
                  'it' => 'www.google.com',
                  'en' => 'www.google.com'
                ],
                'link_label' => [
                  'it' => 'scopri di piu',
                  'en' => 'discover more'
                ],
                'template' => 'default/_textleft_videoright.html.twig',
                'block_group' => BlocksManager::BLOCK_GROUP_HOME
            ],
            [
                'title' => [
                  'it' => 'Lorem Ipsum Blocco 4',
                  'en' => 'EN Lorem Ipsum Blocco 4'
                ],
                'subtitle' => [
                  'it' => 'Lorem Ipsum Blocco 4',
                  'en' => 'EN Lorem Ipsum Blocco 4'
                ],
                'content' => [
                  'it' => '<h2>Lorem Ipsum 4</h2>',
                  'en' => 'EN <h2>Lorem Ipsum 4</h2>',
                ],
                'link' => [
                  'it' => 'www.google.com',
                  'en' => 'www.google.com'
                ],
                'link_label' => [
                  'it' => 'scopri di piu',
                  'en' => 'discover more'
                ],
                'template' => 'default/_full_text.html.twig',
                'block_group' => BlocksManager::BLOCK_GROUP_HOME
            ],
            [
                'title' => [
                  'it' => 'VIno 1',
                  'en' => 'EN VIno 1'
                ],
                'subtitle' => [
                  'it' => 'VIno 1',
                  'en' => 'EN VIno 1'
                ],
                'content' => [
                  'it' => '<h2>Lorem Ipsum 1</h2>',
                  'en' => 'EN <h2>Lorem Ipsum 1</h2>',
                ],
                'link' => [
                  'it' => 'www.google.com',
                  'en' => 'www.google.com'
                ],
                'link_label' => [
                  'it' => 'scopri di piu',
                  'en' => 'discover more'
                ],
                'template' => 'default/_wine-sheet.html.twig',
                'block_group' => BlocksManager::BLOCK_GROUP_VINI
            ],
            [
                'title' => [
                  'it' => 'VIno 2',
                  'en' => 'EN VIno 2'
                ],
                'subtitle' => [
                  'it' => 'VIno 2',
                  'en' => 'EN VIno 2'
                ],
                'content' => [
                  'it' => '<h2>Lorem Ipsum 2</h2>',
                  'en' => 'EN <h2>Lorem Ipsum 2</h2>',
                ],
                'link' => [
                  'it' => 'www.google.com',
                  'en' => 'www.google.com'
                ],
                'link_label' => [
                  'it' => 'scopri di piu',
                  'en' => 'discover more'
                ],
                'template' => 'default/_wine-sheet.html.twig',
                'block_group' => BlocksManager::BLOCK_GROUP_VINI
            ],
            [
                'title' => [
                  'it' => 'VIno 3',
                  'en' => 'EN VIno 3'
                ],
                'subtitle' => [
                  'it' => 'VIno 3',
                  'en' => 'EN VIno 3'
                ],
                'content' => [
                  'it' => '<h3>Lorem Ipsum 3</h3>',
                  'en' => 'EN <h2>Lorem Ipsum 2</h2>',
                ],
                'link' => [
                  'it' => 'www.google.com',
                  'en' => 'www.google.com'
                ],
                'link_label' => [
                  'it' => 'scopri di piu',
                  'en' => 'discover more'
                ],
                'template' => 'default/_wine-sheet.html.twig',
                'block_group' => BlocksManager::BLOCK_GROUP_VINI
            ],
            [
                'title' => [
                  'it' => 'Block Group Vigne 1',
                  'en' => 'EN Block Group Vigne 1'
                ],
                'subtitle' => [
                  'it' => 'Block Group Vigne 1',
                  'en' => 'EN Block Group Vigne 1'
                ],
                'content' => [
                  'it' => '<h2>Block Group Vigne 4</h2>',
                  'en' => 'EN <h2>Block Group Vigne 4</h2>',
                ],
                'link' => [
                  'it' => 'www.google.com',
                  'en' => 'www.google.com'
                ],
                'link_label' => [
                  'it' => 'scopri di piu',
                  'en' => 'discover more'
                ],
                'template' => 'default/_videofullwidth.html.twig',
                'block_group' => BlocksManager::BLOCK_GROUP_VIGNE
            ],
            [
                'title' => [
                  'it' => 'Block Group Vigne 2',
                  'en' => 'EN Block Group Vigne 2'
                ],
                'subtitle' => [
                  'it' => 'Block Group Vigne 2',
                  'en' => 'EN Block Group Vigne 2'
                ],
                'content' => [
                  'it' => '<h2>Block Group Vigne 2</h2>',
                  'en' => 'EN <h2>Block Group Vigne 2</h2>',
                ],
                'link' => [
                  'it' => 'www.google.com',
                  'en' => 'www.google.com'
                ],
                'link_label' => [
                  'it' => 'scopri di piu',
                  'en' => 'discover more'
                ],
                'template' => 'default/_videofullwidth.html.twig',
                'block_group' => BlocksManager::BLOCK_GROUP_VIGNE
            ],
            [
                'title' => [
                  'it' => 'Block Group Vigne 3',
                  'en' => 'EN Block Group Vigne 3'
                ],
                'subtitle' => [
                  'it' => 'Block Group Vigne 3',
                  'en' => 'EN Block Group Vigne 3'
                ],
                'content' => [
                  'it' => '<h2>Block Group Vigne 3</h2>',
                  'en' => 'EN <h2>Block Group Vigne 3</h2>',
                ],
                'link' => [
                  'it' => 'www.google.com',
                  'en' => 'www.google.com'
                ],
                'link_label' => [
                  'it' => 'scopri di piu',
                  'en' => 'discover more'
                ],
                'template' => 'default/_videofullwidth.html.twig',
                'block_group' => BlocksManager::BLOCK_GROUP_VIGNE
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
            $translation->setPosition($key);
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