<?php

declare(strict_types=1);

namespace App\Form;

use App\Command\Car\CarCreateCommand;
use App\Command\CarsCreateCommand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cars', CollectionType::class,[
                'entry_type' => CarType::class,
                'label' => false,
                'entry_options' => [
                    'label' => false,
                    'data_class' => CarCreateCommand::class,
                ],
                'by_reference' => false,
                'allow_add' => true,
            ])
            ->add('Save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarsCreateCommand::class,
        ]);
    }

    
}
