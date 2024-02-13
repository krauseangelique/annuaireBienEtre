<?php

namespace App\Controller;


use App\Entity\Prestataire;
use App\Entity\User;
use App\Form\PrestataireType;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
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

    // Ce que la méhtode fait c'est son rôle ...
    /**
     *  cf. Lior
     */
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prestataire = new Prestataire();

        // 3. lier le formulaire au controller dans lequel on se trouve
        $form = $this->createForm(RegistrationFormType::class, $prestataire);

        // récupère les informations du formulaire envoyé
        $form->handleRequest($request);

        if ($form->isSubmitted() && !$form->isValid()) {

            $message = $form->getErrors('email');
            // dump($message);
            // dd($form);
            // verify_email_error : nom de la variable dans l'affichage de la vue
            $this->addFlash('verify_email_error', " l'Adresse mail existe déjà");

            return $this->redirectToRoute('app_register');
        }

        if ($form->isSubmitted() && $form->isValid()) {
            /* 
                1) récupération du contenu du champ email du formulaire
                $contenuMail = $form->get('email')->getData(); V
                2) vérification de la valeur du mail Est ce que celle-ci se trouve déjà  en DB
                    2a) On a besoin d'une query et une connection PDO en Symfony c'est le 
                    repertoire Repository User et on va utiliser l' EntityManager et on va appeler User repository
                    $repository =$entityManager->getRepository(Prestataire::class); V
                    2b) On va appeler la méthode  findOneBy() du user Repository afin de pouvoir vérifier si l'email est en DB. V
                3) Si l'émail se trouve en DB afficher le message d'erreur  : votre adresse email existe déjà veuillez vous connecter à votre compte
                4) Sinon afficher un message de success en envoyant un email de confirmation d'inscription
             */

            //  Si flush  (il se fera dans la 2ème partie de l'inscription) 
            //  } else {
            //     # code... // encode the email (Ce que l'utilisateur a rempli comme champs)
            // $prestataire->setEmail(
            //     $form->get('email')->getData()
            //     )
            // ;
            //  }

            $contenuMail = $form->get('email')->getData();
            $repository = $entityManager->getRepository(User::class);

            $isMail = $repository->findOneBy(['email' => $contenuMail]);

        

            if ($isMail === null) {
                # code...
                // generate a signed url and email it to the user Prestataire        
                $this->emailVerifier->sendEmailConfirmation(
                    'app_verify_email',
                    $prestataire,
                    (new TemplatedEmail())
                        ->from(new Address('mailer@your-domain.com', 'Bien Etre'))
                        ->to($prestataire->getEmail())

                        // Editer en français
                        // ->subject('Please Confirm your Email')
                        ->subject('Pouvez vous confirmer votre adresse mail ?')
                        ->htmlTemplate('registration/confirmation_email.html.twig')
                );


               // $entityManager->persist($prestataire);
                // $entityManager->flush(); à remplacer par handleEmailConfirmation en 2ème partie

                // Après envoie de l'email à la personne qui souhaite s'inscrire
                $this->addFlash('success', "Un email vous a été envoyé ");


                // do anything else you need here, like send an email

                return $this->redirectToRoute('app_register');

            }
            // } else {
            //     dd("c'est quoi ça !");
            //     # code...
            //     // message flash
            //     $this->addFlash('verify_email_error', "votre adresse email existe déjà veuillez vous connecter à votre compte ");

            //     return $this->redirectToRoute('app_register');
            // }

        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);

    }

    /* 2ième partie de l'inscription */
    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {

        // Comment récupérer l'information dans l' URL    
        //dump($request->query->get('email'));
        // dd($request);
        $email = $request->query->get('email');

        // Création d'un prestataire
        $prestataire = new Prestataire;

        // Les infos de mon prestataire (formulaire1)
        $prestataire->setEmail($email);
        $prestataire->setIsVerified(true);
        $prestataire->setRoles(['ROLE_PRESTATAIRE']);
        $prestataire->setTypeUtilisateur('prestataire');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
           // !! Si l'email a déjà été soumis (l'email est en DB) alors envoyer un message flash vous avez déjà confirmé votre email pour votre inscription 

        if ($prestataire->isVerified()!== true) {

            $this->addFlash('verify_email_error', 'Vous avez déjà confimé votre inscription');
            return $this->redirectToRoute('app_register');

        } else {
            
            $this->emailVerifier->handleEmailConfirmation($request, $prestataire);
        
        }

        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Votre adresse mail a bien été vérifiée');

        return $this->redirectToRoute('app_home');
    }

// partie 3 : Finalisation de l'inscription PRESTATAIRE
    #[Route('/inscription', name: 'app_inscription')]
    public function inscription(Request $request): Response
    {
         // Les infos de mon prestataire (formulaire2)
        // récupération d'1 prestataire pré-inscrit via son mail
       // $prestataireInscrit = $this->userRepository->findOneByUser($email);

        $prestataireInscrit = new Prestataire;
        

         // 3. lier le formulaire au controller dans lequel on se trouve
        $form = $this->createForm(PrestataireType::class, $prestataireInscrit);


        /* 
        https://www.comment-devenir-developpeur.com/les-formulaires-sous-symfony-6#:~:text=Dans%20Symfony%2C%20tous%20sont%20des%20%C2%AB%20types%20de,de%20formulaire%20%C2%BB%20%28par%20exemple%2C%20UserProfileType%29.%20%C3%89l%C3%A9ments%20suppl%C3%A9mentaires
        2. Création de classes de formulaire
        Symfony recommande de mettre le moins de logique possible dans les contrôleurs. C’est pourquoi il est préférable de déplacer les formulaires complexes vers des classes dédiées plutôt que de les définir dans les actions du contrôleur. De plus, les formulaires définis dans des classes peuvent être réutilisés dans plusieurs actions et services

        */
    
            // $prestataire->setAdresseNum($adresseNum);
            // $formInscription = $this->createFormBuilder(); // // hash du mot de passe
            // $prestataire->setPassword(
            //     $prestatairePasswordHasher->hashPassword(
            //     $prestataire,
            //     $formInscription->get('plainPassword')->getData()
            //     )
            // );

            // 4. Soumettre le formulaire
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // $form->getData() holds the submitted values
                // but, the original `$task` variable has also been updated
                $task = $form->getData();
    
                dump("coucou");
                dd($task);
                // ... perform some action, such as saving the task to the database
    
                return $this->redirectToRoute('task_success');
            }


            // 5.retourner une vue, un fichier TWIG
            return $this->render('registration/inscription.html.twig', [
                'registrationForm' => $form->createView(),
            ]);

    
    }
}


            // // hash du mot de passe
            // $prestataire->setPassword(
            //     $prestatairePasswordHasher->hashPassword(
            //     $prestataire,
            //     $form->get('plainPassword')->getData()
            //     )
            // );