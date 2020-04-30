<?php

namespace App\Form;

use App\Entity\MaritimeTransport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaritimeTransportType extends AbstractType
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
            'data_class' => MaritimeTransport::class,
        ]);
    }
}
