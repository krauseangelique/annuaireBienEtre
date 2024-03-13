<?php

namespace App\Security;

use Symfony\Bundle\SecurityBundle\Security as SecurityBundleSecurity;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;

use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Twig\Sandbox\SecurityError;

class UsersAuthenticator extends AbstractLoginFormAuthenticator
{
    // récupération du Trait
    use TargetPathTrait;

    // app_login sera le nom de la route qui va permettre de créer son LOGIN
    public const LOGIN_ROUTE =  'app_login';

    // pour créer des générateurs d'URL min 6:50 https://www.youtube.com/watch?v=INfHFDIjgrw&t=4s
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }


    /* CREATION DE L'AUTHENTIFICATION */
      // Passport est un nouvel élément de Symfony (depuis la 5.3) généré par authenticate qui permet de gérer l'authentification des utilisateurs
    public function authenticate(Request $request): Passport
    {
        // On récupère en POST l'email
        $email = $request->request->get('email', '');

        // Dans la session on récupère le dernier utilisateur qui a été tapé
        // $request->getSession()->set(SecurityBundle::LAST_USERNAME, $email);
        $request->getSession()->set(Security::LAST_USERNAME, $email);
    

       // $request->getSession()->set('_security.last_username', $email);
        
        return new Passport(
            // le UserBadge va permettre d'aller rechercher l'utilisateur ici par son email
            new UserBadge($email),

            // va récupérer le mot de passe tapé par l'utilisateur => credentials = identifiants
            new PasswordCredentials($request->request->get('password', '')),
            [
                // jeton token de sécurité qui authentifie que le formulaire vient bien de notre application (site)
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
                new RememberMeBadge(),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // Une fois l'authentification réalisée on passe à la méthode suivante, celle-ci : le $targetPath est le chemin de retour min 9:30 pour revenir sur la page à partir de laquelle il s'est connecté 
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            
            return new RedirectResponse($targetPath);
        }

        // For example: ma route pour le HomeController app_home
        // je vais rediriger mon utilisateur vers home (main dans la vidéo min 10:30)
        // return new RedirectResponse($this->urlGenerator->generate('some_route'));
        return new RedirectResponse($this->urlGenerator->generate('app_home'));
        //throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }

}



