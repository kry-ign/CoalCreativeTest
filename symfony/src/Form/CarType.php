<?php

namespace App\Form;

use App\Command\Car\CarAbstractCommand;
use App\Entity\DriveTrain;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('model', TextType::class)
            ->add('year', DateType::class, [
                'label' => 'Year of production'
            ])
            ->add('driveTrain', EntityType::class,[
                'class' => DriveTrain::class,
                'choice_label' => 'name',
            ])
            ->add('saveAndAdd', SubmitType::class, ['label' => 'Save and Add'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarAbstractCommand::class,
        ]);
    }

    
}
