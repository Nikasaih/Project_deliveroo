<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RestaurantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomRestaurant')
            ->add('Localisation')
            ->add('HoraireOuverture')
            ->add('InfosComplementaire')
            ->add(
                'ListAllergene',
                FileType::class,
                array(
                    'label' => 'Choisissez image pour les allergène'

                )
            )
            ->add(
                'photo',
                FileType::class,
                array(
                    'label' => 'Choisissez une photo de votre restaurant'

                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
