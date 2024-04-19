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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestataireSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('email')
            // ->add('roles')
            // ->add('password')
            // ->add('adresseNum')
            // ->add('adresseRue')
            // ->add('inscription')
            // ->add('typeUtilisateur')
            // ->add('nbEssaisInfructueux')
            // ->add('banni')
            // ->add('inscriptConfirmee')
            // ->add('isVerified')
            ->add('nom', TextType::class, [
                'required' => false,
            ])
            // ->add('siteInternet')
            // ->add('numTel')
            // ->add('numTVA')

            ->add('adresseCP', EntityType::class, [
                'class' => CodePostal::class,
'choice_label' => 'codePostal',
            ])
            ->add('adresseProvince', EntityType::class, [
                'class' => Province::class,
'choice_label' => 'province',
            ])
            ->add('commune', EntityType::class, [
                'class' => Commune::class,
'choice_label' => 'commune',
            ])

//             ->add('categorieServices', EntityType::class, [
//                 'class' => CategorieServices::class,
// 'choice_label' => 'nom',
// 'multiple' => true,
//             ])

->add('categorieServices', ChoiceType::class, [
    'choices' =>[
        'barbier'   => 'barbier',
        'coiffeur'  => 'coiffeur',
        'esthéticienne' => 'esthéticienne',
        'pédicure'  => 'pédicure',
        'centre de spa et balnéothérapie' => 'centre de spa et balnéothérapie',
        'massage'   => 'massage',
        'medecines alternatives' => 'medecines alternatives',
    ],
    'required' => false,
    'expanded' => false,
])

//             ->add('internautesFavoris', EntityType::class, [
//                 'class' => Internaute::class,
// 'choice_label' => 'id',
// 'multiple' => true,
//             ])
        ;
    }

    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestataire::class,
        ]);
    }
}
