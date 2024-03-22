<?php

namespace App\Controller;

use App\Form\PrestataireSearchType;
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

    #[Route('/prestataire/search', name: 'app_prestataire_search')]
    public function search(Request $request): Response
    {
        // Pas de formulaire mais formulaire dans twig (comme le formulaire d'inscription)
        $form = $this->createForm(PrestataireSearchType::class);
        $form->handleRequest($request);
    }

}
