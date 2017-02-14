<?php

namespace BshdevBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
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
            ->add('concil', CKEditorType::class, array(
                'label' => 'Description',
                ))
            ->add('services', CKEditorType::class, array(
                'label' => 'Description',
                ))
            ->add('infrastruture', CKEditorType::class, array(
                'label' => 'description',
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
        return 'bshdevbundle_editHomepage';
    }


}
