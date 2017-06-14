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
            $home_block->setBlockGroup(BlocksManager::BLOCK_GROUP_HOME);

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