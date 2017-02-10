<?php

namespace BshdevBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartnerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                'label' => 'titre',
            ))
            ->add('description')
            ->add('alt', null, array(
                'label' => 'Légende de l\'image',
            ))
            ->add('fileLogo', 'file', array('required' => false,
                'label'=>'Ajouter un logo',
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BshdevBundle\Entity\Partner'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bshdevbundle_partner';
    }


}
