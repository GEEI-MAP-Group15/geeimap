<?php

namespace App\Form;

use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class Essai1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Name of student may not be blank'])
            ],
            'label' => 'Name'
            ])
            ->add('firstname', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Firstname of student may not be blank'])
            ],
            'label' => 'Firstame'
            ])
            //->add('date_of_birth')
            //->add('home_address')
            //->add('national_id_number')
            //->add('user')
            //->add('academicdata')
            //->add('application')
            //->add('background')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
