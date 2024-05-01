<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

// Fichier généré par le make:auth



class SecurityController extends AbstractController
{
    /* la sécurité dans une application Symfony p 377 Chap 10 du PDF  Symfony 5 ENI
    /**
* @Route("/login 11
, name="login")
    ici ce trouve la fermeture de balise avec l'astérisque et le slash

public function index(AuthenticationUtils $auth): Response
{
// On récupère les éventuelles erreurs d'authentification
précédentes
// pour afficher un message.
$erreur = $auth->getLastAuthenticationError();
return $this->render('login/index.html.twig',
'erreur' => $erreur
l);
Le template associé à cette action contient le formulaire de connexion
{% extends 'base.html.twig' %}
{% block body%}
{% if erreur%}
<div>{{ erreur.message }}</div>
{% endif %}
<form action=" { { path( 'l og in check') } }" method="post" >
<label>
Identifiant :
</label>
<input type="text" name=" username" />
<br />
<label>
Mot de passe :
</label>
<input type="password" name="_password" />

    */
    // normalement je ne devrai pas avoir besoin de la Request min 3:42/47:21 https://youtu.be/INfHFDIjgrw Inscription et authentification des utilisateurs (Symfony 6)
    #[Route('/login', name: 'app_login')]
    public function login(Request $request, AuthenticationUtils $authenticationUtils): Response
    {


        // if ($request->request->count() > 0) {
        //     # code...
        //     dd($request);
        // } else {
        //     // dd($authenticationUtils);
        //     // dd("le tableau de la request est vide ou inexistent !");
        // }


        // permet de rediriger un utilisateur qui aurait déjà une connection, vers la route de son compte
        // https://nouvelle-techno.fr/articles/5-inscription-et-authentification-des-utilisateurs-symfony-6

        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one min 5:06
        //$error = $authenticationUtils->getLastAuthenticationError(false);

        // // last email entered by the user
        //    $lastEmail = $authenticationUtils->getLastEmail();

        // return $this->render('security/login.html.twig', [
        //     'last_email' => $lastEmail, 'error' => $error]);

        // last username entered by the user
        $lastUsername = $authenticationUtils->getlastUsername();
        $lastEmail = $authenticationUtils->getlastUsername();



        // dd($lastEmail);

        return $this->render('security/login.html.twig', [
            'last_email' => $lastEmail,
            'error' => false
            //'error' => $error
        ]);
        // 'last_username' => $lastUsername,
        // 'error' => $error
        // ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method cans be blank - it will be intercepted by the logout key on your firewal.');
    }
}
