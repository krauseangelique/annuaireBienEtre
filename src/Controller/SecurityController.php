<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

// https://stackoverflow.com/questions/62823232/symfony-5-keeps-redirecting-from-the-register-route

class SecurityController extends AbstractController
{
    #[Route('/login', name:'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // permet de rediriger un utilisateur qui aurait déjà une connection, vers la route de son compte
        // https://nouvelle-techno.fr/articles/5-inscription-et-authentification-des-utilisateurs-symfony-6
        if($this->getUser()) {
            return $this->redirectToRoute('target_path');
        }

        // get the login error if there is one min 5:06
        $error = $authenticationUtils->getLastAuthenticationError();

        // // last email entered by the user
        // $lastEmail = $authenticationUtils->getLastEmail();

            // return $this->render('security/login.html.twig', [
            //     'last_email' => $lastEmail, 'error' => $error]);

        // last username entered by the user
        $lastUsername = $authenticationUtils->getlastUsername();
$lastEmail = $authenticationUtils->getlastUsername();
        // @TODO réaliser la page security/login.html.twig
        return $this->render('security/login.html.twig', [
            'last_email' => $lastEmail, 'error' => $error]);
            // 'last_username' => $lastUsername,
            // 'error' => $error
        // ]);
    }

    #[Route('/logout', name:'app_logout')]
    public function logout(): void{
        throw new \LogicException('This method cans be blank - it will be intercepted by the logout key on your firewal.');
    }
}
