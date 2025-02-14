<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MapMarkerController extends AbstractController
{
    #[Route('/map/marker', name: 'map_get_markers', methods: ['GET'])]    
    /**
     * getMarkers permet de situer des Points sur la carte
     *
     * @return JsonResponse
     */
    public function getMarkers(): JsonResponse
    {
        // Exemple de données simulées
        $markers = [
            ['longitude' => 5.518, 'latitude' => 50.6372, 'title' => 'Point A'],
            ['longitude' => 5.5750, 'latitude' => 50.6400, 'title' => 'Point B']

        ];

        // return $this->render('map_marker/index.html.twig', [
        //     'controller_name' => 'MapMarkerController',
        // ]);
        return new JsonResponse($markers);
    }
}
