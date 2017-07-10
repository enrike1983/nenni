<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;

class SeoBlocksAdmin extends AbstractAdmin
{
  protected function configureFormFields(FormMapper $formMapper)
  {
      $formMapper
          ->with('Country')
              ->add('translations', TranslationsType::class)
          ->end();
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
      //$datagridMapper->add('title');
  }

  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->add('block_group')
          ->add('_action', 'actions', array(
              'actions' => array(
                  'edit' => array(),
                  'delete' => array(),
              ),
          ));
  }
}