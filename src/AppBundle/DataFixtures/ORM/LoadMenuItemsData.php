<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\MenuItem;
use AppBundle\Entity\MenuItemTranslation;
use AppBundle\Entity\News;
use AppBundle\Entity\NewsTranslation;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadMenuItemsData extends AbstractFixture
{
    public function getMenuStructure()
    {
        return [
            [
                'label' => [
                  'it' => 'La Tenuta',
                  'en' => 'La Tenuta'
                ],
                'route' => 'la-tenuta'
            ],
			[
				'label' => [
					'it' => 'Le Vigne',
					'en' => 'Le Vigne'
				],
				'route' => 'le-vigne'
			],
			[
				'label' => [
					'it' => 'Il Metodo Nenni',
					'en' => 'Il Metodo Nenni'
				],
				'route' => 'il-metodo-nenni'
			],
            [
                'label' => [
                    'it' => 'I Vini',
                    'en' => 'I Vini'
                ],
                'route' => 'vini'
       		],
            [
				'label' => [
					'it' => 'Contatti',
					'en' => 'Contatti'
				],
				'route' => 'contatti'
     		],
        ];
    }

    protected function createTranslations($translations, $locale, $manager)
    {
        foreach ($translations as $key => $menuItem) {

            $translation = new MenuItemTranslation();
            $translation->setLabel($menuItem['label'][$locale]);
            $translation->setLocale($locale);
            $translation->setTranslatable($this->getReference($menuItem['route']));

            $manager->persist($translation);
            $manager->flush();
        }
    }

    public function createMenuStructure($items, $manager)
    {
        foreach ($items as $i => $mi) {
            $menu_item = new MenuItem();
            $menu_item->setRoute($mi['route']);
            $menu_item->setPosition($i);

            $this->addReference($mi['route'], $menu_item);

            $manager->persist($menu_item);
        }

       $manager->flush();
    }

    public function load(ObjectManager $manager)
    {
        $translations = $this->getMenuStructure();

        $this->createMenuStructure($translations, $manager);
        $this->createTranslations($translations, 'it', $manager);
        $this->createTranslations($translations, 'en', $manager);
    }
}