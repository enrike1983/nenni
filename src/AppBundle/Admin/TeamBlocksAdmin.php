<?php

namespace AppBundle\Admin;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use AppBundle\Manager\BlocksManager;
use Sonata\AdminBundle\Form\FormMapper;

class TeamBlocksAdmin extends BaseBlocksAdmin
{
    protected $baseRouteName = 'blocks_'.BlocksManager::BLOCK_GROUP_TEAM;
    protected $baseRoutePattern = BlocksManager::BLOCK_GROUP_TEAM;

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->eq($query->getRootAliases()[0] . '.block_group', ':block_group')
        );
        $query->setParameter('block_group', BlocksManager::BLOCK_GROUP_TEAM);
        return $query;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);

        $formMapper
          ->remove('template')
          ->remove('imageFile')
          ->remove('videoFile');

    }

    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        $instance->setBlockGroup(BlocksManager::BLOCK_GROUP_TEAM);

        return $instance;
    }
}