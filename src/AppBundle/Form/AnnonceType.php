<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('emailProprietaire')
        ->add('telephoneProprietaire')
        ->add('nomProprietaire')
        ->add('nom')
        ->add('adresse')
        ->add('complementAdresse')
        ->add('codePostal')
        ->add('ville')
        ->add('typeBien')
        ->add('typeLocation')
        ->add('dureeMin')
        ->add('dureeMax')
        ->add('dateDisponible')
        ->add('surface')
        ->add('nombrePieces')
        ->add('commodites')
        ->add('loyer')
        ->add('charges')
        ->add('description')
        ->add('informations')
        //->add('images')
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
