<?php

namespace App\Controller;

use App\Entity\CategorieServices;
use App\Entity\CodePostal;
use App\Entity\Commune;
use App\Entity\Province;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeRecherchePrestataireController extends AbstractController
{
    #[Route('/liste/recherche/prestataire', name: 'app_liste_recherche_prestataire')]
    public function formulaireRecherchePrestataire(EntityManagerInterface $entityManager): Response
    {
        $communerecherche = $entityManager->getRepository(Commune::class);
        // Récupération de toutes les communes
        $communes = $communerecherche->findAll();
        // dd($communes); // liste de toutes les communes

        $cprecherche = $entityManager->getRepository(CodePostal::class);
        $codepostals = $cprecherche->findAll();

        $provincerecherche = $entityManager->getRepository(Province::class);
        $provinces = $provincerecherche->findAll();

        $categorierecherche = $entityManager->getRepository(CategorieServices::class);
        $categories = $categorierecherche->findAll();
       // dd($codepostals);
    
        // RECHERCHE
        return $this->render('prestataire_search/recherchePrestataireSearch.html.twig', [
            //'controller_name' => 'ListeRecherchePrestataireController',
            'communes' => $communes,
            'adresseCPs' => $codepostals,
            'adresseProvinces' => $provinces,

            'categories' => $categories,
        
        ]);
    }
}
