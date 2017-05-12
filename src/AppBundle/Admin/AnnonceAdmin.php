<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AnnonceAdmin extends Admin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper;
    }
}
