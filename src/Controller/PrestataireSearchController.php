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
// dd($categorieServices);
// dump($commune);
// dump($adresseCP);
// dump($adresseProvince);
        // 2. vérifier dans Result et recherche ce que je récupère normalement c'est une liste de prestataire

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
    
        $tabCateg = [];

        foreach ($resultatRecherches as $key => $value) {
        
            // getCategorieServices() me renvoie le tableau de catégorie (la Collection de catégories) pour pouvoir lire les noms de la catégorie il faut boucler sur le tableau des catégories d'où le foreach imbriqué
            foreach($resultatRecherches[$key]->getCategorieServices() as $keyCateg => $tabCategorie){

                $tabCateg[] = $resultatRecherches[$key]->getCategorieServices()[$keyCateg]->getNom();
            }
        }

        //dump($tabCateg);

        // dd($resultatRecherches); // il m'affiche le résultat de la Recherche mais il ne change pas de route et n'affiche donc pas le résultat de la recherche
        // return $this->redirectToRoute('app_home');
        return $this->render('prestataire_search/listePrestataire.html.twig', [

            'prestataires' => $resultatRecherches,
            'categories' => $categorieServices,
            'tabCateg' => $tabCateg,
        ]);
    }

}