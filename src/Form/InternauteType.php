<?php

namespace App\Form;

use App\Entity\CodePostal;
use App\Entity\Commune;
use App\Entity\Image;
use App\Entity\Internaute;
use App\Entity\Prestataire;
use App\Entity\Province;
use Doctrine\DBAL\Types\BooleanType;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class InternauteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // CONFIRMATION de l'inscription FICHE SIGNALETIQUE COMPLETE
        $builder
            // ->add('email')
            // ->add('roles')
            // ->add('password')
            ->add('plainPassword', PasswordType::class, [
                // password is read and encoded in the controller (cf. doc Symfony)
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez introduire votre mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'votre mot de passe doit contenir au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                        
                    ]),
                ],
            ])

            ->add('adresseNum', TextType::class, [
                'required' => false,
            ])
            ->add('adresseRue', TextType::class, [
                'required' => false,
            ])
            // ->add('inscription')
            // ->add('typeUtilisateur')
            // ->add('nbEssaisInfructueux')
            // ->add('banni')
            // ->add('inscriptConfirmee')
            // ->add('isVerified')
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('newsletter', BooleanType::class)

            ->add('adresseCP', EntityType::class, [
                'class' => CodePostal::class,
// 'choice_label' => 'id',
'choice_label' => 'codePostal',
            ])
            ->add('adresseProvince', EntityType::class, [
                'class' => Province::class,
//'choice_label' => 'id',
'choice_label' => 'province',
            ])
            ->add('commune', EntityType::class, [
                'class' => Commune::class,
//'choice_label' => 'id',
'choice_label' => 'commune',
            ])
            ->add('image', EntityType::class, [
                'class' => Image::class,
'choice_label' => 'id',
            ])

//             ->add('prestataires', EntityType::class, [
//                 'class' => Prestataire::class,
// 'choice_label' => 'id',
// 'multiple' => true,
//             ])

//             ->add('prestatairesFavoris', EntityType::class, [
//                 'class' => Prestataire::class,
// 'choice_label' => 'id',
// 'multiple' => true,
//             ])

                    // moi je mets le submit dans ma vue donc je ne dois pas le prévoir ici
                // ->add('editer', SubmitType::class)
        ;
    }

    // La deuxième méthode (configureOptions) va au fait nous permettre d'explicitement définir la classe à la qu'elle est rattachée ce formulaire.
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Internaute::class,
        ]);
    }
}
