<?php

namespace App\Form;

use App\Entity\Medicijnen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Medicijnen1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naam')
            ->add('werking')
            ->add('bijwerking')
            ->add('verzekerd')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medicijnen::class,
        ]);
    }
}
