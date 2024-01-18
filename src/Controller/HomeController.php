<?php

namespace App\Controller;

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
    public function index(): Response
    {
        // mon controlleur pour la page home
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
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
