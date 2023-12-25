<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    // ma route pour la page home
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // mon controlleur pour la page home
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/test', name: 'app_test')]
    public function test(): Response
    {
        return $this->render('home/test.html.twig', []);
    }
}
