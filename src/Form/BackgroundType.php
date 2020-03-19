<?php

namespace App\Form;

use App\Entity\Background;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BackgroundType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('previous_university')
            ->add('previous_city')
            ->add('security_reason')
            ->add('is_validated')
            ->add('period_type')
            ->add('period_value')
            #->add('student')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Background::class,
        ]);
    }
}
