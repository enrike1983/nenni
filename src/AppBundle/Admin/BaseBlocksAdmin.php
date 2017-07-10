<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Vich\UploaderBundle\Form\Type\VichFileType;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BaseBlocksAdmin extends AbstractAdmin
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
            ->add('template', ChoiceType::class, [
                'choices' => $this->getTemplatesList(),
                'attr' => ['class' => 'nenni-block-template']
            ])
            ->add('imageFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
            ])
            ->add('videoFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
            ])
            ->end();
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
      //$datagridMapper->add('title');
  }

  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->add('title', null, array(
              'template' => 'admin/Common/transl-title.html.twig'
          ))
          ->add('subtitle', null, array(
              'template' => 'admin/Common/transl-subtitle.html.twig'
          ))
          ->add('link_label', null, array(
              'template' => 'admin/Common/transl-link-label.html.twig'
          ))
          ->add('template')
          ->add('_action', 'actions', array(
              'actions' => array(
                  'edit' => array(),
                  'delete' => array(),
              ),
          ));
  }

  protected function getTemplatesList()
  {
      $finder = new Finder();
      $finder->in(__DIR__.'/../../../app/Resources/views/default/blocks');

      $formatted = [];

      foreach($finder as $file) {
          $pathname = $file->getRelativePathname();
          $formatted[$pathname] = 'default/blocks/'.$pathname;
      }
      return $formatted;
  }
}