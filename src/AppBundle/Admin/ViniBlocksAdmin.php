<?php

namespace AppBundle\Admin;

use AppBundle\Manager\BlocksManager;
use Sonata\AdminBundle\Form\FormMapper;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Sonata\AdminBundle\Datagrid\ListMapper;

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

    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);

        $formMapper->with('Logo')
              ->add('logoFile', VichImageType::class, [
                  'required' => false,
                  'allow_delete' => true,
              ])
          ->end();

        $formMapper->with('Pdf')
              ->add('pdfFile', VichFileType::class, [
                  'required' => false,
                  'allow_delete' => true,
              ])
          ->end();
    }
    
    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        $instance->setBlockGroup(BlocksManager::BLOCK_GROUP_VINI);

        return $instance;
    }
}