<?php

namespace App\Form;

use App\Entity\Student;
use App\Entity\College;
use App\Entity\AcademicData;
use App\Entity\Application;
use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Your name may not be blank'])
            ],
            'label' => 'Name',
            'help' => 'Write your name',
            'attr' => ['placeholder' => 'Pabich'],
            ])
            ->add('firstname', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Your firstname may not be blank'])
            ],
            'label' => 'Firstname',
            'help' => 'Write your Firstname',
            'attr' => ['placeholder' => 'Florian'],
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
                'label' => 'Home Address',
                'help' => 'Write your address',
                'attr' => ['placeholder' => '158 Bethune Street, 62232 Hinges'],
            ])
            ->add('national_id_number', IntegerType::class, [
                'label' => 'National ID number',
                'help' => 'Give your national ID number',
                'attr' => ['placeholder' => '0123456'],
            ])
            /*->add('college', EntityType::class, [
                'class' => College::class,
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false
            ])*/
            ->add('background', BackgroundType::class)
            ->add('academicdata', AcademicDataType::class)
            ->add('application', ApplicationType::class, [
                'disabled' => true
            ])
            #->add('documents', DocumentType::class)
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
