<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnnonceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('emailProprietaire', EmailType::class)
        ->add('telephoneProprietaire')
        ->add('nomProprietaire')
        ->add('nom')
        ->add('images', CollectionType::class, array(
            'entry_type'   => FichierType::class,
            'allow_add' => true,
            'allow_delete' => true,
            'delete_empty' => true,
            'prototype' => true,
            'by_reference' => false
        ))
        ->add('adresse', TextareaType::class)
        ->add('complementAdresse', null, array('required' => false))
        ->add('codePostal', IntegerType::class)
        ->add('ville')
        ->add('typeBien')
        ->add('typeLocation')
        ->add('dureeMin')
        ->add('dureeMax')
        ->add('dateDisponible', DateType::class)
        ->add('surface', IntegerType::class)
        ->add('nombrePieces', IntegerType::class)
        ->add('commodites')
        ->add('loyer', MoneyType::class)
        ->add('charges', MoneyType::class)
        ->add('description', TextareaType::class)
        ->add('informations', TextareaType::class)
        ->add('submit', SubmitType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Annonce'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_annonce';
    }


}
