<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;

class PonyFilterType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, ['label' => false, 'required' => false, 'attr' => ['placeholder' => 'Name']])
            ->add('bornAt', null, ['label' => false, 'required' => false, 'attr' => ['placeholder' => 'Born at']])
            ->add('deadAt', null, ['label' => false, 'required' => false, 'attr' => ['placeholder' => 'Dead at']])
            ->add('livingAt', null, ['label' => false, 'required' => false, 'attr' => ['placeholder' => 'Living at']])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pony_filter';
    }


}
