<?php
namespace TranslationsBundle\Translation;

use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Config\Resource\FileResource;

class DbLoader implements LoaderInterface
{
    private $entity_manager;

    public function setEntityManager($em)
    {
        $this->entity_manager = $em;
    }

    public function load($resource, $locale, $domain = 'messages')
    {
        $token_repo = $this->entity_manager->getRepository("TranslationsBundle:Token");

        //Load on the db for the specified local
        $tokens = $token_repo->findAll();

        $catalogue = new MessageCatalogue($locale);

        foreach ($tokens as $token) {
            $catalogue->set($token->getToken(), $token->translate()->getContent(), $domain);
        }

        $catalogue->addResource(new FileResource($resource));

        return $catalogue;
    }
}
