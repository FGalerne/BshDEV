<?php

namespace BshdevBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditHomepageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('concil', 'textarea', array(
                'label' => 'Description',
                'attr' => array(
                    'class' => 'ckeditor'
                )))
            ->add('services', 'textarea', array(
                'label' => 'Description',
                'attr' => array(
                    'class' => 'ckeditor'
                )))
            ->add('infrastruture', 'textarea', array(
                'label' => 'description',
                'attr' => array(
                    'class' => 'ckeditor'
            )))
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
        return 'bshdevbundle_admin';
    }


}
