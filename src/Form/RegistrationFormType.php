<?php

namespace App\Form;

use App\Entity\Abonnement;
use App\Entity\ModeDePaiement;
use App\Entity\Utilisateur;
use App\Form\AbonnementType;
use Doctrine\ORM\EntityRepository;
use App\Repository\AbonnementRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('abonnement',EntityType::class,[
                // Le nomù de l'entité que l'ont peux renseigner. Ici l'auteur de l'article
                'class'=>Abonnement::class,
                //Ici on fait une requete pour trouver kes auteurs de notre blog
                // et les classer par ordre alphabetique de nom puis prenom
                'query_builder'=> function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('a')->orderBy('a.type','ASC');
                },
                'choice_label'=>'type'
            ])

            ->add('modeDePaiement',EntityType::class,[
                // Le nomù de l'entité que l'ont peux renseigner. Ici l'auteur de l'article
                'class'=>ModeDePaiement::class,
                //Ici on fait une requete pour trouver kes auteurs de notre blog
                // et les classer par ordre alphabetique de nom puis prenom
                'query_builder'=> function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('a')->orderBy('a.type','ASC');
                },
                'choice_label'=>'type'
            ])

            ->add('pseudo')
            ->add('email')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
