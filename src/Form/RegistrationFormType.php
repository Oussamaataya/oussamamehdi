<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        
            ->add('email',EmailType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'style'=>'background: rgb(30,40,51);'
                    
        

                ],
                'label' =>'E-mail'
            ])
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' =>'form-control',
                    'style'=>'background: rgb(30,40,51);'
    
                ],
                'label' => 'Nom',
                
            ])
            ->add('prenom',TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'style'=>'background: rgb(30,40,51);'
                ],
                'label' =>'Prenom'
            ])
      
            ->add('tel',TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'style'=>'background: rgb(30,40,51);'
                ],
                'label' =>'Telephone'
            ])
            ->add('numCnam',TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'style'=>'background: rgb(30,40,51);'
                ],
                'label' =>'Num Cnam',
                'required' => false,
            ])
            ->add('adresse',TextType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'style'=>'background: rgb(30,40,51);'
                ],
                'label' =>'Adresse',
                'required' => false,
            ])


            ->add('consent', CheckboxType::class , [
                                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Accept les conditions',
                    ]),
                    
                ],
                
                'label' =>'En m\'inscrivant a ce site j\'accepte toutes les conditions  ',
                'label_attr' => [
                    'style' => 'margin-right: 10px;', 
                ],
            ])
           




            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
               
                'first_options'  => [
                    'label' => 'Mot de passe',
                    'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control',
                    'style'=>'background: rgb(30,40,51);'
                ]
                ],
                
                'second_options' => [
                    'label' => 'Répéter le mot de passe',
                    'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control',
                    'style'=>'background: rgb(30,40,51);'
                     ],
                    'row_attr' => ['style' => 'margin-top: 18px;'
                ], 

                ],
                
                'invalid_message' => 'Les mots de passe doivent correspondre.',
                
               
            ])
            ->setAttributes([
                'style' => 'background: rgb(30,40,51);',
            ]);
            
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
