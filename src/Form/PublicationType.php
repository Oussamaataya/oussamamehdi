<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 
use App\Entity\Users; 
use App\Entity\Commentaire;
use App\Form\CommentaireType; 
use App\Entity\Publication;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Nutrition' => 'Nutrition',
                    'Progrés' => 'Progrés',
                ],
                'placeholder' => 'Choose a type', 
                'required' => true, 
            ])
            ->add('titre')
            ->add('description')
            ->add('image', FileType::class, [
                'label' => 'Image',
                'required' => false,
                'data_class' => null, 
            ])
            ->add('video')
          
            ->add('id_user', EntityType::class, [
                'class' => Users::class, // Set the class to the User entity
                'choice_label' => 'email', // Set the property to display in the dropdown
                'placeholder' => 'Select a user', // Optional: Add a placeholder
                'required' => true, 
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }
}

