<?php

namespace BshdevBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array(
                'label' => 'Prénom'
            ))
            ->add('lastname', null, array(
                'label' => 'Nom'
            ))
            ->add('address', null, array(
                'label' => 'Adresse'
            ))
            ->add('postalCode', null, array(
                'label' => 'code postal'
            ))
            ->add('town', null, array(
                'label' => 'Ville'
            ))
            ->add('phone', null, array(
                'label' => 'Téléphone'
            ))
            ->add('cellphone', null, array(
                'label' => 'Portable'
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BshdevBundle\Entity\Admin'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bshdevbundle_editHistory';
    }


}
