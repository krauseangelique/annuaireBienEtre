<?php

namespace App\Controller;

use App\Entity\Prestataire;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

class PrestataireSearchController extends AbstractController
{
    // #[Route('/prestataire/search', name: 'app_prestataire_search')]
    // public function index(): Response
    // {
    //     return $this->render('prestataire_search/index.html.twig', [
    //         'controller_name' => 'PrestataireSearchController',
    //     ]);
    // }

    // 1.Faire appel à l'EntityManager
    #[Route('prestataire/search', name: 'app_prestataire_search')]
    public function search(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Pas de formulaire mais formulaire dans twig (comme le formulaire d'inscription)
    
        

        // 2. Je fais appel au Repository PrestataireRepository
        $repositoryPrestataire = $entityManager->getRepository(Prestataire::class);

        // 3. je fais appel à la méthode du Repository qui contient la requête
        // dump($request->request->get('nom')); // je récupère la valeur du champ introduit par l'utilisateur
        // dump($request->request->get('categorie')); // 1. je récupère la valeur du champ introduit par l'utilisateur (via le name du formulaire) Maintenant je dois regarder comment en PHP mettre un champ "" à null
    

        // dd($request);
        // maintenant je vais récupérer les champs pour chaque variable ou mettre la valeur à null ou ne pas remplir la valeur
        $nom = $request->request->get('nom');
        $categorieServices = $request->request->get('categorieDeService');
        $commune = $request->request->get('commune');
        $adresseCP = $request->request->get('adresseCP');
        $adresseProvince = $request->request->get('adresseProvince');
// dump($nom);
// dump($categorieServices);
// dump($commune);
// dump($adresseCP);
// dump($adresseProvince);
        // 2. vérifier dans Result et recherche ce que je récupère normalement c'est une liste de prestataire

        // 3. je dois créer la vue qui est listePrestataire.html.twig et dans cette vue j'affiche les prestataires trouvés
        
    
        $resultatRecherches = $repositoryPrestataire->findPrestaire($categorieServices, $commune, $adresseCP, $adresseProvince, $nom);

        // dd($categorieServices);
        // dd($resultatRecherches);
        return $this->render('prestataire_search/listePrestataire.html.twig', [

            'prestataires' => $resultatRecherches,
            'categories' => $categorieServices,
        ]);
    }

}
