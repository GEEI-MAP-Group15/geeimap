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
                'help' => 'Write the name of your previous university (in troubled area)',
                'attr' => ['placeholder' => 'Baghdad University'],
        ])
            ->add('previous_city', TextType::class, [
                'label' => 'Previous City',
                'help' => 'Write your previous city',
                'attr' => ['placeholder' => 'Baghdad'],
            ])
            ->add('security_reason', ChoiceType::class, [
                #'choices' => Property::HEAT
                'choices' => $this->getChoices(),
                'help' => 'Choose the closest reason of your move to Baghdad University',
            ])
            ->add('is_validated', CheckboxType::class, [
                'label' => 'Previous year validated ?',
                'help' => 'Tick if you validated your previous year/semester in troubled University',
            ])
            ->add('period_type', ChoiceType::class, [
                #'choices' => Property::HEAT
                'choices' => $this->getChoices2(),
                'help' => 'Choose the period type of validation of your studies in your previous University',
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
