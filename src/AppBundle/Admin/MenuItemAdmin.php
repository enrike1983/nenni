<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class MenuItemAdmin extends AbstractAdmin
{
  protected $datagridValues = array(
      '_page' => 1,
      '_sort_order' => 'ASC',
      '_sort_by' => 'position',
  );

  protected function configureFormFields(FormMapper $formMapper)
  {
      $formMapper
          ->with('Country')
              ->add('translations', TranslationsType::class)
          ->end()
          ->with('Common')
            ->add('route')
            ->add('externalUrl', UrlType::class, [
              'label' => 'Se compilato questa voce di menu indirizza a questa url',
              'required' => false
            ])
          ->end()
          ->remove('route');
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
      //$datagridMapper->add('title');
  }

  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->add('label', null, array(
              'template' => 'admin/Common/transl-label.html.twig'
          ))
          ->add('route')
          ->add('externalUrl')
          ->add('_action', 'actions', array(
              'actions' => array(
                  'edit' => array(),
                  'delete' => array(),
              ),
          ));
  }
}