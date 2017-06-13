<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BaseBlocksAdmin extends AbstractAdmin
{
  protected $datagridValues = array(
      '_page' => 1,
      '_sort_order' => 'ASC',
      '_sort_by' => 'position',
  );

  protected function configureFormFields(FormMapper $formMapper)
  {
      $formMapper->add('title');
      $formMapper->add('subtitle');
      $formMapper->add('content');
      $formMapper->add('link');
      $formMapper->add('link_label');
      $formMapper->add('template');
      $formMapper->add('imageFile', 'file');
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
      $datagridMapper->add('title');
  }

  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper->addIdentifier('title');
      $listMapper->addIdentifier('position');
      $listMapper->addIdentifier('template');
      $listMapper->addIdentifier('link_label');
      $listMapper->addIdentifier('link');
  }
}