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
                'url' => [
                  'it' => 'news-1',
                  'en' => 'en-news-1'
                ],
                'date' => new \DateTime('08-09-2017'),
                'reference' => 'news-1'
            ],
            [
                'title' => [
                  'it' => 'News 2',
                  'en' => 'EN News 2'
                ],
                'content' => [
                  'it' => '<h2>Lorem Ipsum 2</h2>',
                  'en' => 'EN <h2>Lorem Ipsum 2</h2>',
                ],
                'url' => [
                  'it' => 'news-2',
                  'en' => 'en-news-2'
                ],
                'date' => new \DateTime('09-09-2017'),
                'reference' => 'news-2'
            ],
            [
                'title' => [
                  'it' => 'News 3',
                  'en' => 'EN News 3'
                ],
                'content' => [
                  'it' => '<h2>Lorem Ipsum 3</h2>',
                  'en' => 'EN <h2>Lorem Ipsum 3</h2>',
                ],
                'url' => [
                  'it' => 'news-3',
                  'en' => 'en-news-3'
                ],
                'date' => new \DateTime('10-09-2017'),
                'reference' => 'news-3'
            ],
            [
                'title' => [
                  'it' => 'News 4',
                  'en' => 'EN News 4'
                ],
                'content' => [
                  'it' => '<h2>Lorem Ipsum 4</h2>',
                  'en' => 'EN <h2>Lorem Ipsum 4</h2>',
                ],
                'url' => [
                  'it' => 'news-4',
                  'en' => 'en-news-4'
                ],
                'date' => new \DateTime('11-09-2017'),
                'reference' => 'news-4'
            ],
            [
                'title' => [
                  'it' => 'News 5',
                  'en' => 'EN News 5'
                ],
                'content' => [
                  'it' => '<h2>Lorem Ipsum 5</h2>',
                  'en' => 'EN <h2>Lorem Ipsum 5</h2>',
                ],
                'url' => [
                  'it' => 'news-5',
                  'en' => 'en-news-5'
                ],
                'date' => new \DateTime('12-09-2017'),
                'reference' => 'news-5'
            ],
        ];
    }

    protected function createTranslations($translations, $locale, $manager)
    {
        foreach ($translations as $key => $news) {

            $translation = new NewsTranslation();
            $translation->setTitle($news['title'][$locale]);
            $translation->setContent($news['content'][$locale]);
            $translation->setUrl($news['url'][$locale]);
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