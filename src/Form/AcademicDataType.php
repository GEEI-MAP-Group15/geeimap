<?php

namespace App\Form;

use App\Entity\AcademicData;
use App\Entity\College;
use App\Entity\Module;
use App\Entity\AcademicLevel;
use App\Entity\Degree;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AcademicDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            #->add('college')
            ->add('college', EntityType::class, [
                'class' => College::class,
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
                'label' => 'College',
                'help' => 'Chose your college',
            ])
            #->add('modules')
            ->add('modules', EntityType::class, [
                'class' => Module::class,
                'choice_label' => 'name',
                'multiple' => true,
                'required' => false,
                'label' => 'Modules',
                'help' => 'Chose your modules',
            ])
            #->add('academiclevel')
            ->add('academiclevel', EntityType::class, [
                'class' => AcademicLevel::class,
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
                'label' => 'Academic Level',
                'help' => 'Chose your academic level',
            ])
            #->add('student')
            #->add('degree')
            ->add('degree', EntityType::class, [
                'class' => Degree::class,
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
                'label' => 'Degree',
                'help' => 'Chose your degree',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AcademicData::class,
        ]);
    }
}
