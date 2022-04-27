<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label'=>'Votre prénom',
                'attr'=>[
                    'placeholder'=> 'Ludovic'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label'=>'Votre nom',
                'attr'=>[
                    'placeholder'=>'Dupont'
                ]
            ])
            ->add('email', EmailType::class, [
                'label'=>'Votre email',
                'attr'=>[
                    'placeholder'=>'dupont@dpond.com'
                ]
            ])
            ->add('street', TextType::class, [
                'label'=>'Votre nom de rue',
                'attr'=>[
                    'placeholder'=>'rue Victor Hugo'
                ]
            ])
            ->add('number', TextType::class, [
                'label'=>'Votre numéro de porte',
                'attr'=>[
                    'placeholder'=>'35'
                ]
            ])
            ->add('city', TextType::class, [
                'label'=>'Votre ville',
                'attr'=>[
                    'placeholder'=>'Lyon'
                ]
            ])
            ->add('postal_code', TextType::class, [
                'label'=>'Votre code postal',
                'attr'=>[
                    'placeholder'=>'69000'
                ]
            ])
            ->add('country', CountryType::class, [
                'label'=>'Votre pays',
                'attr'=>[
                    'placeholder'=>'France'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type'=>PasswordType::class,
                'invalid_message'=>'Le mot de passe et la confirmation doivent être identique.',
                'label'=>'Votre mot de passe',
                'required'=> true,
                'first_options'=>[ 'label'=> 'Mot de passe'],
                'second_options'=> [ 'label'=> 'confirmez votre mot de passe']

            ])
            ->add('submit', SubmitType::class,[
                'label'=>'s\'inscrire'
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
