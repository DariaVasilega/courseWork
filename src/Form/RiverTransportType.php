<?php

namespace App\Form;

use App\Entity\RiverTransport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RiverTransportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('engine')
            ->add('seats')
            ->add('weight')
            ->add('size')
            ->add('fuelCost')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RiverTransport::class,
        ]);
    }
}
