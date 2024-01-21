<?php

namespace App\Controller;


use App\Entity\Prestataire;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prestataire = new Prestataire();
        $form = $this->createForm(RegistrationFormType::class, $prestataire);

        // récupère les informations du formulaire envoyé
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        
             // encode the email (Ce que l'utilisateur a rempli comme champs)
            $prestataire->setEmail(
                $form->get('email')->getData()
                )
            ;


            // Ne pas mettre en DB la première partie de l'inscription  PERSIST ET FLUSH
            // $entityManager->persist($prestataire);
            // $entityManager->flush();

            // generate a signed url and email it to the user Prestataire
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $prestataire,
                (new TemplatedEmail())
                    ->from(new Address('mailer@your-domain.com', 'Bien Etre'))
                    ->to($prestataire->getEmail())

                    // Editer en français
                    // ->subject('Please Confirm your Email')
                    ->subject('Pouvez vous confirmer votre adresse mail ?')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_home');
        }


        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    // 2ième partie de l'inscription
    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
       // On est pas dans le cas d'élévation des droits
       // $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        // Comment récupérer l'information dans une URL    
        //dump($request->query->get('email'));
        // dd($request);
        $email = $request->query->get('email');

        // Création d'un prestataire
        $prestataire = new Prestataire;

        // Les infos de mon prestataire (formulaire1)
        $prestataire -> setEmail($email);
        $prestataire -> setIsVerified(true);
        $prestataire -> setRoles(['ROLE_PRESTATAIRE']);
        $prestataire -> setTypeUtilisateur('prestataire');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
        
            $this->emailVerifier->handleEmailConfirmation($request, $prestataire);
        
        
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Votre adresse mail a bien été vérifiée');

        return $this->redirectToRoute('app_home');
    }
}
