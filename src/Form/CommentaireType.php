<?php

namespace App\Form;

use App\Entity\Commentaire;
use App\Entity\Publication;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('contenu')
            ->add('id_user', EntityType::class, [
                'class' => Users::class,
                'choice_label' => 'nom', // Display the 'nom' attribute of the User entity
            ])
            ->add('id_pub', EntityType::class, [
                'class' => Publication::class,
                'choice_label' => 'titre', // Display the 'titre' attribute of the Publication entity
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
        ]);
    }
}
