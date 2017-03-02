<?php

namespace BshdevBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CandidatureType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array(
                'label' => 'Prénom',
            ))
            ->add('lastname', null, array(
                'label' => 'Nom',
            ))
            ->add('address', null, array(
                'label' => 'Adresse'
            ))
            ->add('cp', null, array(
                'label' => 'Code postal'
            ))
            ->add('town', null, array(
                'label' => 'Ville'
            ))
            ->add('email', null, array(
                'label' => 'Email'
            ))
            ->add('phone', null, array(
                'label' => 'Télèphone'
            ))
            ->add('fileIdentity', FileType::class, array(
                'required' => false,
                'label'=>'Votre photo'
            ))
            ->add('fileCv', FileType::class, array(
                'required' => true,
                'label'=>'Déposez votre CV'
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BshdevBundle\Entity\Person'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bshdevbundle_candidature';
    }


}
