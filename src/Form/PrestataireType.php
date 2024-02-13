<?php

namespace App\Form;

use App\Entity\CategorieServices;
use App\Entity\CodePostal;
use App\Entity\Commune;
use App\Entity\Internaute;
use App\Entity\Prestataire;
use App\Entity\Province;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

// Création de classes de formulaire
class PrestataireType extends AbstractType
{
    // première méthode le buildForm()
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // CONFIRMATION de l'inscription FICHE SIGNALETIQUE COMPLETE
        $builder
            //->add('email', EmailType::class)
           // ->add('roles') // permet de connaitre le rôle dont l'user fait l'objet concernant les permissions qu'il possède 
            // ->add('password')
            ->add('plainPassword', PasswordType::class, [
                                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'S\'il vous plait, introduisez votre mot de passe',
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
           /// ->add('inscription')
            // ->add('typeUtilisateur') // string que je mets dans l'application
            // ->add('nbEssaisInfructueux', IntegerType::class)
            // ->add('banni')
            // ->add('inscriptConfirmee')

            ->add('nom', TextType::class)
            ->add('siteInternet', UrlType::class, [
                'required' => false,
            ])
            ->add('numTel', TelType::class, [
                'required' => false,
            ])
            ->add('numTVA')
            ->add('adresseCP', EntityType::class, [
                'class' => CodePostal::class,
'choice_label' => 'id',
'required' => false,
            ])
            ->add('adresseProvince', EntityType::class, [
                'class' => Province::class,
'choice_label' => 'id',
            ])
            ->add('commune', EntityType::class, [
                'class' => Commune::class,
'choice_label' => 'id',
'required' => false,
            ])
            ->add('categorieServices', EntityType::class, [
                'class' => CategorieServices::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('internautesFavoris', EntityType::class, [
                'class' => Internaute::class,
'choice_label' => 'id',
'multiple' => true,
'required' => false,
            ])
            // Valider le formulaire
            ->add('Sauvegarder', SubmitType::class, ['label' => 'Enregistrer vos données pour finaliser votre inscription'])
        ;
    }
    // La deuxième méthode (configureOptions) va au fait nous permettre d'explicitement définir la classe à la qu'elle est rattachée ce formulaire.
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestataire::class,
        ]);
    }
}
