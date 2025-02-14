<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MapSearchController extends AbstractController
{
    #[Route('/map/search', name: 'app_map_search', methods: ['GET'])]
    public function search(Request $request): JsonResponse
    {
        // 'controller_name' => 'MapSearchController',
        $query = $request->query->get('query');

        if (!$query) {
            return new JsonResponse(['error' => 'Veuillez entrer une adresse valide !'], 400);
        }
        // coordonnées pour la rue Piron, 37 à Saint-Nicolas à titre d'exemple (in https://www.coordonnees-gps.fr/)
        $coordinates = [
            'longitude' => 5.544114,
            'latitude' => 50.625643,
            'full_address' => 'Rue Piron 37, Saint-Nicolas, Belgique'
        ];

        return new JsonResponse(($coordinates));
    }
}
