<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password',PasswordType::class)
            ->add('confirm_password',PasswordType::class)
            ->add('gender')
            ->add('lastName')
            ->add('firstName')
            ->add('adress')
            ->add('nationality')
            ->add('cv')
            ->add('dateOfBirth')
            ->add('category')
            ->add('experience')
            ->add('availibility')
            ->add('isAdmin')
            ->add('dateCreate')
            ->add('dateUpdate')
            ->add('dateDeleted')
            ->add('files')
            ->add('jobOffers')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
