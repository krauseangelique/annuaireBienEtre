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
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestataireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // CONFIRMATION de l'inscription FICHE SIGNALETIQUE COMPLETE
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('adresseNum')
            ->add('adresseRue')
            ->add('inscription')
            ->add('typeUtilisateur')
            // ->add('nbEssaisInfructueux')
            // ->add('banni')
            // ->add('inscriptConfirmee')
            ->add('nom')
            ->add('siteInternet')
            ->add('numTel')
            ->add('numTVA')
            ->add('adresseCP', EntityType::class, [
                'class' => CodePostal::class,
'choice_label' => 'id',
            ])
            ->add('adresseProvince', EntityType::class, [
                'class' => Province::class,
'choice_label' => 'id',
            ])
            ->add('commune', EntityType::class, [
                'class' => Commune::class,
'choice_label' => 'id',
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
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestataire::class,
        ]);
    }
}
