<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
    
            ->add('nom', TextType::class, [
                
                'attr' => ['class' => 'form-control']
            ])
            
            

            ->add('email', EmailType::class, [
                
                'attr' => ['class' => 'form-control']
            ])
            ->add('tel', TextType::class, [
                
                'attr' => ['class' => 'form-control']
            ])
            ->add('prenom', TextType::class, [
                
                'attr' => ['class' => 'form-control']
            ])
            ->add('adresse', TextType::class, [
                
                'attr' => ['class' => 'form-control']
            ])

            ->add('numCnam',TextType::class, [
                'row_attr' => ['style' => 'margin-bottom: 10px;'],
                'attr' => ['class' => 'form-control']
            ])
            
            ->add('valider', SubmitType::class, [
                'label' => 'Modifier',
                'attr' => [
                    'class' => 'btn btn-secondary',
                    'type' => 'button'
                ]
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
