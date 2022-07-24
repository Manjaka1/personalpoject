<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', textType::class,[
                'label' => 'Votre prénom',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre prénom'
                ]
                
            ])
            ->add('lastname', TextType::class,[
                'label' => 'Votre nom',
                'attr' => [
                    'placeholder'=>'Merci de saisir votre nom'
                ]
            ])
            ->add('email', EmailType::class,[
                'label'=>'Votre mail',
                'attr' => [
                    'placeholder'=> 'Veuillez entrer votre mail'
                ]
            ])
            ->add('password', PasswordType::class,[
                'label'=>'Votre mot de passse',
                'attr' => [
                    'placeholder'=> 'Veuillez entrer votre mot de passe'
                ]
            ])
            ->add('password_confirm', PasswordType::class,[
                'label'=>'Confirmez votre mot de passe',
                'mapped'=> false,
                'attr'=>[
                    'placeholder'=>'Veuillez confirmer votre mot de passe'
                ]
            ])
            ->add('submit', SubmitType::class,[
                'label'=> "S'inscrire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}