<?php

namespace App\Form;

use App\Entity\IdentificationPrestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdentificationPrestationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('societe', TextType::class, [
                'label' => 'Société',
                'label_attr' => [
                    'class' => 'block text-sm font-medium leading-6 text-gray-900'
                ],
                'attr' => [
                    'class' => 'block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'
                ]
            ])
            ->add('nomPrenom', TextType::class, [
                'label' => 'Nom / Prénom',
                'label_attr' => [
                    'class' => 'block text-sm font-medium leading-6 text-gray-900'
                ],
                'attr' => [
                    'class' => 'block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'
                ]
            ])
            ->add('prestation', TextType::class, [
                'label' => 'Prestations',
                'label_attr' => [
                    'class' => 'block text-sm font-medium leading-6 text-gray-900'
                ],
                'attr' => [
                    'class' => 'block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'
                ]
            ])
            ->add('commanditaire', TextType::class, [
                'label' => 'Commanditaire ',
                'label_attr' => [
                    'class' => 'block text-sm font-medium leading-6 text-gray-900'
                ],
                'attr' => [
                    'class' => 'block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => [
                    'class' => "bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                ]
            ])
        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => IdentificationPrestation::class,
        ]);
    }
}
