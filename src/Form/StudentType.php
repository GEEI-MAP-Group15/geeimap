<?php

namespace App\Form;

use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\NotBlank;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Your name may not be blank'])
            ],
            'label' => 'Name'
            ])
            ->add('firstname', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Your firstname may not be blank'])
            ],
            'label' => 'Firstname'
            ])
            ->add('date_of_birth', DateType::class, [
                'placeholder' => [
                    'day' => 'Day', 'month' => 'Month', 'year' => 'Year', 
                ],
                'format' => 'ddMMMMyyyy',
                'years' => range(1900,2020)
            ])
            ->add('home_address', TextareaType::class, [
                'constraints' => [new NotBlank(['message' => 'Your home address may not be blank'])
            ],
            'label' => 'home_address'
            ])
            ->add('national_id_number')
            ->add('background', BackgroundType::class)
            ->add('academicdata', AcademicDataType::class)
            #->add('user')
            #->add('academicdata')
            #->add('application')
            #->add('background')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
