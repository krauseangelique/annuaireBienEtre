<?php

namespace App\Controller;

use App\Entity\CategorieServices;
use App\Entity\Prestataire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    // ma route pour la page home
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager ): Response
    {

        // je récupère les données catégories de ma DB
        $repositoryCategory = $entityManager->getRepository(CategorieServices::class);

        // tableau des catégories
        $categories = $repositoryCategory->findAll();

          // je récupère les données prestataires de ma DB (le nom puis le logo)
            $repositoryPrestataire = $entityManager->getRepository(Prestataire::class);

           // tableau des 4 derniers prestataires
            $prestataires = $repositoryPrestataire->findBy4End();

        // mon controlleur pour la page home
        return $this->render('home/index.html.twig', [
            'categories' => $categories,
            'prestataires' => $prestataires,
            
        ]);
    }
    // Dans ma route test, je vais envoyer un mail pour vérifier si le mailer fonctionne bien
    #[Route('/test', name: 'app_test')]
    public function test(MailerInterface $mailerInterface): Response
    {
        // Ecriture du mail test
        $email = (new Email())
        ->from('hello@example.com')
        ->to('you@examle.com')
        ->subject('Time for Symfony Mailer!')
        ->text('Sending emails is fun again!')
        ->html('<p>See Twig integration for better HTML integration!</p>');

        // Utilisation du MailerInterface
        try{
            $mailerInterface->send($email);
        } catch(TransportExceptionInterface $error){
            echo $error;
        }
        


        return $this->render('home/test.html.twig', []);
    }
}
