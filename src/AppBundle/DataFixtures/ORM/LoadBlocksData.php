<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Block;
use AppBundle\Entity\BlockTranslation;
use AppBundle\Manager\BlocksManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Vich\UploaderBundle\Entity\File;

class LoadBlocksData extends AbstractFixture
{

    public function getSiteStructure()
    {
        return [
          [
            'title' => [
              'it' => 'Eccellente di natura dal 1272',
              'en' => 'Excellent by nature since 1272',
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
            'template' => 'default/blocks/_intro-video.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
            'primary_video' => 'demo_hp.mp4',
          ],
          [
            'title' => [
              'it' => 'La Tenuta',
              'en' => 'La Tenuta',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '/it/la-tenuta',
              'en' => '/en/la-tenuta',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_textleft_imageright.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
            'primary_image' => 'demo_latenuta.jpg',
          ],
          [
            'title' => [
              'it' => 'Il Territorio',
              'en' => 'Il Territorio',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_imageleft_textright.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
            'primary_image' => 'demo_ilterritorio.jpg',
          ],
          [
            'title' => [
              'it' => 'Le Vigne',
              'en' => 'Le Vigne',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '/it/le-vigne',
              'en' => '/en/le-vigne',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_videofullwidth.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
            'primary_video' => 'demo_vigna_bg.mp4',
          ],
          [
            'title' => [
              'it' => 'Il Metodo Nenni',
              'en' => 'Il Metodo Nenni',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '/it/il-metodo-nenni',
              'en' => '/en/il-metodo-nenni',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_textleft_videoright.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
            'primary_video' => 'demo_il_metodo.mp4',
          ],
          [
            'title' => [
              'it' => 'Le Persone',
              'en' => 'Le Persone',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '/it/la-tenuta#people',
              'en' => '/en/la-tenuta#people',
            ],
            'link_label' => [
              'it' => 'scopri di piu',
              'en' => 'discover more',
            ],
            'template' => 'default/blocks/_people.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_HOME,
          ],
            #####################
            ##### LA TENUTA #####
            #####################
          [
            'title' => [
              'it' => 'La Tenuta Nenni',
              'en' => 'La Tenuta Nenni',
            ],
            'subtitle' => [
              'it' => '',
              'en' => '',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_intro-image.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_LA_TENUTA,
            'primary_image' => 'demo_hero_la_tenuta.jpg',
          ],
          [
            'title' => [
              'it' => 'I Territori di San Galgano',
              'en' => 'I Territori di San Galgano',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_full_text--light.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_LA_TENUTA,
          ],
          [
            'title' => [
              'it' => '',
              'en' => '',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_imageleft_textright.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_LA_TENUTA,
              'primary_image' => 'demo_ilterritorio.jpg'
          ],
          [
            'title' => [
              'it' => '',
              'en' => '',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_textleft_imageright.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_LA_TENUTA,
              'primary_image' => 'demo_2.jpg'
          ],
          [
            'title' => [
              'it' => 'L\'Azienda',
              'en' => 'L\'Azienda',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_textleft_imageright.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_LA_TENUTA,
              'primary_image' => 'demo_3.jpg'
          ],
          [
            'title' => [
              'it' => '',
              'en' => '',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_textleft_imageright.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_LA_TENUTA,
            'primary_video' => 'demo_la_tenuta.mp4'
          ],
            #####################
            ###### LE VIGNE #####
            #####################
          [
            'title' => [
              'it' => 'Le Vigne',
              'en' => 'Le Vigne',
            ],
            'subtitle' => [
              'it' => '',
              'en' => '',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_intro-image.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VIGNE,
            'primary_image' => 'demo_latenuta_hero.jpg',
          ],
          [
            'title' => [
              'it' => 'Vigna Allegra',
              'en' => 'Vigna Allegra',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_videofullwidth.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VIGNE,
            'primary_video' => 'demo_allegra.mp4',
          ],
          [
            'title' => [
              'it' => 'Vigna Allegra',
              'en' => 'Vigna Allegra',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_full_text--light.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VIGNE,
          ],
          [
            'title' => [
              'it' => 'Vigna Barucci',
              'en' => 'Vigna Barucci',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_videofullwidth.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VIGNE,
            'primary_video' => 'demo_barucci.mp4',
          ],
          [
            'title' => [
              'it' => 'Vigna Barucci',
              'en' => 'Vigna Barucci',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_full_text--dark.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VIGNE,
          ],
          [
            'title' => [
              'it' => 'Vigna Sara',
              'en' => 'Vigna Sara',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_videofullwidth.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VIGNE,
            'primary_video' => 'demo_sara.mp4',
          ],
          [
            'title' => [
              'it' => 'Vigna Sara',
              'en' => 'Vigna Sara',
            ],
            'subtitle' => [
              'it' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
              'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            'content' => [
              'it' => '',
              'en' => '',
            ],
            'link' => [
              'it' => '',
              'en' => '',
            ],
            'link_label' => [
              'it' => '',
              'en' => '',
            ],
            'template' => 'default/blocks/_full_text--light.html.twig',
            'block_group' => BlocksManager::BLOCK_GROUP_VIGNE,
          ],
            ##############################
            ###### IL METODO NENNI #######
            ##############################
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

            $image = new File();

            if (isset($block['primary_image'])) {
                $image->setName($block['primary_image']);
                $image->setOriginalName($block['primary_image']);
                $home_block->setImage($image);
            }

            $video = new File();

            if (isset($block['primary_video'])) {
                $video->setName($block['primary_video']);
                $video->setOriginalName($block['primary_video']);
                $home_block->setVideo($video);
            }

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