<?php

namespace App\Form;

use App\Entity\WaterTransport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WaterTransportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model')
            ->add('type')
            ->add('seatsQty')
            ->add('size')
            ->add('weight')
            ->add('carryingCapacity')
            ->add('lifeboard')
            ->add('mastQty')
            ->add('engineType')
            ->add('material')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => WaterTransport::class,
        ]);
    }
}
