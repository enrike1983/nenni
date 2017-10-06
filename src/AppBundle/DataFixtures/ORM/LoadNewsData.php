<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\News;
use AppBundle\Entity\NewsTranslation;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadNewsData extends AbstractFixture
{
    public function getSiteStructure()
    {
//        return [];

        return [
            [
                'title' => [
                  'it' => 'News 1',
                  'en' => 'EN News 1'
                ],
                'content' => [
                  'it' => '<h2>Lorem Ipsum 1</h2>',
                  'en' => 'EN <h2>Lorem Ipsum 1</h2>',
                ],
                'url' => 'test-1',
                'date' => new \DateTime('08-09-2017'),
                'reference' => 'news-1'
            ]
        ];
    }

    protected function createTranslations($translations, $locale, $manager)
    {
        foreach ($translations as $key => $news) {

            $translation = new NewsTranslation();
            $translation->setTitle($news['title'][$locale]);
            $translation->setContent($news['content'][$locale]);
            $translation->setLocale($locale);
            $translation->setTranslatable($this->getReference($news['reference']));

            $manager->persist($translation);
            $manager->flush();
        }
    }

    public function createSiteStructure($news, $manager)
    {
        foreach ($news as $i => $sn) {
            $singlenew = new News();
            $singlenew->setDate($sn['date']);
            $singlenew->setUrl($sn['url']);

            $this->addReference($sn['reference'], $singlenew);

            $manager->persist($singlenew);
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