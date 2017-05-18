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
        $formMapper
        ->with('Propriétaire')
          ->add('nomProprietaire', 'text', array('help'=> 'Nom du propriétaire.'))
          ->add('emailProprietaire', 'email', array('help'=> 'Email du propriétaire.'))
          ->add('telephoneProprietaire', 'text', array('help'=> 'Telephone du propriétaire.'))
        ->end()
        ->with('Photos')
          //->add('images', 'sonata_type_model')
          ->add('images', 'sonata_type_model', array(
              'property' => 'media',
              'required' => false,
              'by_reference' => false,
              'expanded' => true,
              'multiple' => true,
              'help' => 'Les images du bien.',
            ), array('admin_code' => 'admin.fichier'))
        ->end()
        ->with('Bien')
          ->add('nom', 'text', array('help'=> 'Nom de l\'annonce.'))
          ->add('adresse', 'text', array('help'=> 'Adresse du bien.'))
          ->add('complementAdresse', 'text', array('help'=> 'Complement d\'adresse du bien.', 'required' => false))
          ->add('codePostal', 'integer', array('help'=> 'Code postal du bien.'))
          ->add('ville', 'text', array('help'=> 'Ville du bien.'))
          ->add('typeBien', 'choice', array('help'=> 'Type de bien.', 'choices' => $this->getConfigurationPool()->getContainer()->getParameter('type_bien')))
          ->add('typeLocation', 'choice', array('help'=> 'Type de location.', 'choices' => $this->getConfigurationPool()->getContainer()->getParameter('type_location')))
          ->add('dureeMin', 'text', array('help'=> 'Durée min. de location.'))
          ->add('dureeMax', 'text', array('help'=> 'Durée max. de location.'))
          ->add('dateDisponible', 'date', array('help'=> 'Date de disponibilité.'))
          ->add('surface', 'integer', array('help'=> 'Surface du bien.'))
          ->add('nombrePieces', 'integer', array('help'=> 'Nombre de pièce du bien.'))
          ->add('commodites', 'text', array('help'=> 'Commodités du bien.'))
          ->add('loyer', 'integer', array('help'=> 'Loyer du bien.'))
          ->add('charges', 'integer', array('help'=> 'Charges du bien.'))
          ->add('description', 'textarea', array('help'=> 'Description du bien.'))
          ->add('informations', 'textarea', array('help'=> 'Information sur le bien.'))
        ->end()
        ->with('Admin')
          ->add('active', 'checkbox', array('help'=> 'Activer l\'annonce.'))
        ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        ->add('emailProprietaire')
        ->add('nom')
        ->add('adresse')
        ->add('codePostal')
        ->add('ville')
        ->add('typeBien')
        ->add('loyer')
        ->add('active')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->add('emailProprietaire')
        ->add('nom')
        ->add('adresse')
        ->add('codePostal')
        ->add('ville')
        ->add('typeBien')
        ->add('loyer')
        ->add('active')
        ->add('_action', 'actions', array(
          'actions' => array(
            'edit' => array(),
            'delete' => array(),
          )
        ))
        ;
    }
}
