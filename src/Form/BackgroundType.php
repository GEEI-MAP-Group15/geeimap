<?php

namespace App\Form;

use App\Entity\Background;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BackgroundType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('previous_university',TextType::class , [
                
                'label' => 'Previous University',
                'label_attr' => [
                    'class' => ''
                ],
                'help' => 'Write the name of your previous university',
                'attr' => [
                    'placeholder' => 'Baghdad University',
                    'class' => '',
                ],
            ])
            ->add('previous_city', TextType::class, [
                'label' => 'Previous City',
                'help' => 'Write your previous city',
                'attr' => ['placeholder' => 'Baghdad'],
            ])
            ->add('security_reason', ChoiceType::class, [
                #'choices' => Property::HEAT
                'choices' => $this->getChoices()
            ])
            ->add('is_validated', CheckboxType::class, [
                'label' => 'Previous year validated ?',
                'help' => 'Tick if you validated your previous year',
            ])
            ->add('period_type', ChoiceType::class, [
                #'choices' => Property::HEAT
                'choices' => $this->getChoices2()
            ])
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

    private function getChoices()
    {
        $choices = Background::SECURITY_REASON;
        $output = [];
        foreach($choices as $k => $v)
        {
            $output[$v] = $k;
        }
        return $output;
    }

    private function getChoices2()
    {
        $choices = Background::PERIOD_TYPE;
        $output = [];
        foreach($choices as $k => $v)
        {
            $output[$v] = $k;
        }
        return $output;
    }
}
