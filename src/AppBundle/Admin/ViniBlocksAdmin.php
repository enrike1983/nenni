<?php

namespace AppBundle\Admin;

use AppBundle\Manager\BlocksManager;

class ViniBlocksAdmin extends BaseBlocksAdmin
{
    protected $baseRouteName = 'blocks_'.BlocksManager::BLOCK_GROUP_VINI;
    protected $baseRoutePattern = BlocksManager::BLOCK_GROUP_VINI;

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->eq($query->getRootAliases()[0] . '.block_group', ':block_group')
        );
        $query->setParameter('block_group', BlocksManager::BLOCK_GROUP_VINI);
        return $query;
    }
}