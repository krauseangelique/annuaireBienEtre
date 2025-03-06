<?php

namespace App\Controller;

use App\Service\MapboxHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MapSearchController extends AbstractController
{
    #[Route('/map/search', name: 'app_map_search', methods: ['GET'])]
    // public function search(Request $request): JsonResponse
    public function search(MapboxHelper $mapboxHelper): JsonResponse
    {
        // 'controller_name' => 'MapSearchController',
        // $query = $request->query->get('query');
        // je récupère ma query dans l'URL
        $address = $_GET['query'] ?? '';

        if (!$address) {
            return new JsonResponse(['error' => 'Veuillez entrer une adresse valide !'], 400);
            
            // Avant le Helper il me retournait de manière élégante : {"error":"Veuillez entrer une adresse valide !"} donc la JsonResponse puis enfin il me retourne les coordonnées dans la Map

        }

        $coordinates =
            //[
            // 'longitude' => 5.5718,
            // 'latitude' => 50.6372,
            // 'full_address' => 'Liège, Belgique'

            //];
            $mapboxHelper->geocodeAddress($address);

        // coordonnées pour la rue Piron, 37 à Saint-Nicolas à titre d'exemple (in https://www.coordonnees-gps.fr/) recherchez une adresse
        // $coordinates = [
        //     'longitude' => 5.544114,
        //     'latitude' => 50.625643,
        //     'full_address' => 'Rue Piron 37, Saint-Nicolas, Belgique'
        // ];

        // if ($query == 'Paris') {

        // $coordinates = [
        //         'longitude' => 2.348392,
        //         'latitude' => 48.852495,
        //         'full_address' => 'Paris, France'
        //     ];

        if (! $coordinates) 
        {
            return new JsonResponse(['error' => 'Adresse introuvable'], 404);
        }


        return new JsonResponse(($coordinates)); 
    }
}
