<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType as TypeSearchType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TypeSearchType::class, [
            'label' => false,
            'attr' => [
                'requied' => true,
                'placeholder' => 'Mots clés...',
                //'class' => 'form-group',
                'aria - label' => 'Search',
                
            ]
           ])
           ->add('recherche', SubmitType::class, [
            
            'attr' => [
                'class' => 'btn btn-primary ',
                'type'  => 'button',
                
            ]
           ]
           
        )
        ->add('fermer', SubmitType::class, [
            
            'attr' => [
                'class' => 'btn btn-secondary ',
                'type'  => 'button',
                'data-bs-dismiss'=> 'modal',
            ]
    ])
        ->getForm()
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
