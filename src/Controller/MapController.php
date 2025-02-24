<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class MapController extends AbstractController
{
    
    #[Route('/map', name: 'app_map')]    // #[Route('/map', name: 'map_index')]
    /**
     * index permet d'AFFICHER la carte (map) 
     *
     * @return Response
     */
    public function index(): Response
    {
        //   return $this->render('mapbox/map.html.twig', [
        return $this->render('map/index.html.twig', [

            // 'controller_name' => 'MapController',
            'mapbox_token' =>$_ENV['MAPBOX_TOKEN'],
            
        ]);
    }
}
