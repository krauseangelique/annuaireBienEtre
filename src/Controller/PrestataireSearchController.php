<?php

namespace App\Controller;

use App\Entity\CategorieServices;
use App\Entity\Prestataire;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;


class PrestataireSearchController extends AbstractController
{
    // Détail d'UN prestataire
    #[Route('prestataire/detail/{id}', name: 'app_detailPrestataire')]
    public function detailPrestataire(Prestataire $prestataire ): Response
    {
        return $this->render('prestataire_search/detailPrestataire.html.twig', [

            'prestataire' => $prestataire,
                
        ]);
    }

    // 1.Faire appel à l'EntityManager
    #[Route('prestataire/search', name: 'app_prestataire_search')]
    public function search(Request $request, EntityManagerInterface $entityManager): Response
    {
        // !! Pas de formulaire Symfony MAIS un formulaire dans twig (comme le formulaire d'inscription)
    
        // 2. Je fais appel au Repository PrestataireRepository
        $repositoryPrestataire = $entityManager->getRepository(Prestataire::class);

        // 3. je fais appel à la méthode du Repository qui contient la requête
        // dump($request->request->get('nom')); // je récupère la valeur du champ introduit par l'utilisateur
        // dump($request->request->get('categorie')); // 1. je récupère la valeur du champ introduit par l'utilisateur (via le name du formulaire) 
    
        // @TODO voir ce que j'envoie dans ma request !!! elle récupère bien les données du formulaire OK
        // dd($request);

        // maintenant je vais récupérer les champs pour chaque variable ou mettre la valeur à null ou ne pas remplir la valeur
        $categorieServices = $request->request->get('categorieDeService');
        $commune = $request->request->get('commune');

        $adresseCP = $request->request->get('codepostal');
        // dd($adresseCP); //20

        $adresseProvince = $request->request->get('province');
    
    

        $nom = $request->request->get('nom');
    
        // 2. vérifier dans Result et recherche ce que je récupère. Normalement c'est une LISTE de prestataire

        // 3. je dois créer la vue qui est listePrestataire.html.twig et dans cette vue j'affiche les prestataires trouvés
        $resultatRecherches = $repositoryPrestataire->findPrestaire($categorieServices, $commune, $adresseCP, $adresseProvince, $nom);
       // dd($resultatRecherches); // Tableau de prestataires

        // /* Construction du tableau d'id de prestataires que je vais passer à ma recherche par la suite */
        // $categories = [];
        // $repositoryCategory = $entityManager->getRepository(CategorieServices::class);
        //dd($categorieServices); // Si j'effectue la rechercher sur le type de catégorie il m'indique l'id de la catégorie selectionnée

        // dump($categorieType->getNom());
        // dd($categorieType);
        // findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null) permet de travailler avec plusieurs entitées
        // je récupère les données catégories de ma DB

        // tableau des catégories
        // $categories = $repositoryCategory->findBy(['id'=> $ids]);
        //dd($categories);
        // dd($categorieServices);

        // Afficher le premier élement du tableau de recherche
         // dump($resultatRecherches[0]->getCategorieServices()[0]->getNom());
    

        // dd($resultatRecherches); 
        // return $this->redirectToRoute('app_home');
        return $this->render('prestataire_search/listePrestataire.html.twig', [

            'prestataires' => $resultatRecherches,
            // 'categories'   => $categorieServices,
            
        ]);
    }

}
