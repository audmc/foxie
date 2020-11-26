<?php

namespace App\Form;

use App\Entity\Profil;
use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('pseudo')
            ->add('prenom')
            ->add('nom')
            ->add('dateDeNaissance')
            ->add('adresse')
            ->add('codePostal')
            ->add('ville')
            ->add('abonnement')            
            ->add('Enregister',SubmitType::class)
            ->add('Revenir acceuil',ButtonType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profil::class,
        ]);
    }
}
