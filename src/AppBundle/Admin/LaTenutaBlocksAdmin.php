<?php

namespace AppBundle\Admin;

use AppBundle\Manager\BlocksManager;

class LaTenutaBlocksAdmin extends BaseBlocksAdmin
{
    protected $baseRouteName = 'blocks_'.BlocksManager::BLOCK_GROUP_LA_TENUTA;
    protected $baseRoutePattern = BlocksManager::BLOCK_GROUP_LA_TENUTA;

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->eq($query->getRootAliases()[0] . '.block_group', ':block_group')
        );
        $query->setParameter('block_group', BlocksManager::BLOCK_GROUP_LA_TENUTA);
        return $query;
    }

    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        $instance->setBlockGroup(BlocksManager::BLOCK_GROUP_LA_TENUTA);

        return $instance;
    }
}