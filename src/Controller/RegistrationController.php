<?php

namespace App\Controller;

use App\Entity\CategorieServices;
use App\Entity\Prestataire;
use App\Entity\User;
use App\Form\PrestataireType;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use DateTime;
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
    // 1. Vérification du mail introduit par le prestataire
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    // 2. Faire appel à la request
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prestataire = new Prestataire();

        // 3. lier le formulaire au controller dans lequel on se trouve
        $form = $this->createForm(RegistrationFormType::class, $prestataire);

        // 4. récupèrer les informations du formulaire envoyé
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
                // si je désire non pas Prestataire mais prestataire ou internaute alors : 
                /*
                // Récupération du type d'utilisateur choisi
        $userType = $form->get('userType')->getData();

        // Vérification du type d'utilisateur
        if ($userType === 'prestataire') {
            // Traitement pour le cas où le prestataire est choisi
            // Ici, vous pouvez envoyer un email de confirmation spécifique pour les prestataires, par exemple
        } elseif ($userType === 'internaute') {
            // Traitement pour le cas où l'internaute est choisi
            // Ici, vous pouvez faire un traitement spécifique pour les internautes, par exemple
        }
à mettre dans registrationController dans la route register -> dans le if (mail === null)

                */
                # code...
                // generate a signed url and email it to the user Prestataire 
                //  https://github.com/Guichard-Gael/Tuto_mail_Symfony  
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

        // je récupère les données catégories de ma DB
        $repositoryCategory = $entityManager->getRepository(CategorieServices::class);

        // tableau des catégories
        $categories = $repositoryCategory->findAll();

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'categories' => $categories,
        ]);
    }

    /* 2ième partie de l'inscription */
    // 1. Vérifier l'émail
    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {

        // Comment récupérer l'information dans l' URL    
        //dump($request->query->get('email'));
        //dd($request);
        $email = $request->query->get('email');

        // Création d'un prestataire
        $prestataire = new Prestataire;

        // Les infos de mon prestataire (formulaire1)
        $prestataire->setEmail($email);
        $prestataire->setIsVerified(true);
        $prestataire->setRoles(['ROLE_PRESTATAIRE']);
        $prestataire->setTypeUtilisateur('prestataire');

        $prestataire->setInscription(new DateTime());
        // !!! setInscription pour pouvoir récupérer la date de l'inscription ainsi le prestataire sera inscrit à la date du jour

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            // !!! Si l'email a déjà été soumis (l'email est en DB) alors envoyer un message flash vous avez déjà confirmé votre email pour votre inscription 

            if ($prestataire->isVerified() !== true) {

                $this->addFlash('verify_email_error', 'Vous avez déjà confimé votre inscription');
                return $this->redirectToRoute('app_register');
            } else {
                // Gestion de la confirmation du mail
                $this->emailVerifier->handleEmailConfirmation($request, $prestataire);
            }
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Votre adresse mail a bien été vérifiée');

        //
        // $this->getUser();
        //dump( $this->getUser());
        //die();

        // return $this->redirectToRoute('app_home');
        return $this->redirectToRoute('app_inscription', [
            'id' => $prestataire->getId(),

        ]);
    }



    // partie 3 : Finalisation de l'inscription PRESTATAIRE
    //https://symfony.com/doc/current/routing.html#parameters-validation  int $id il passe bien : https://localhost:8000/inscription/28
    // \d+  doit être un nombre
    #[
        Route(
            '/inscription/{id}',
            name: 'app_inscription',
            requirements: ['id' => '\d+'],
            defaults: ['id' => 1],
        )
    ]
    public function inscription(Request $request, int $id, EntityManagerInterface $entityManager, UserPasswordHasherInterface $prestatairePasswordHasher): Response
    {

        // Récupération de l'id 
        $userRepository = $entityManager->getRepository(User::class);


        // je dois vérifier la VALIDITE de l'inscription : &&  $prestataireInscrit->isInscriptConfirmee() != null


        // Je récupère les données du Prestataire dont l'id est passé en paramètre de l'url
        $prestataireInscrit = $userRepository->findOneBy(['id' => $id]); // l'id passé https://localhost:8000/inscription/28




        //$prestataireInscrit = new Prestataire; // On ne traite pas un nouveau prestataire MAIS un prestataire dont l'émail est déjà inscrit dans la DB
        // Les infos de mon prestataire (formulaire2)
        // récupération d'1 prestataire pré-inscrit via son mail, id
        // $prestataireInscrit = $this->userRepository->findOneByUser($email);

        // test conditionnel
        if ($id >= 1) {
            // le code qui suit peut s'exécuter


            // appel de la méthode isInscriptConfirmee() sur l'objet $prestataireInscrit
            if ($prestataireInscrit->isInscriptConfirmee() == true) {

                // @TODO Change the redirect on success and handle or remove the flash message in your templates
                $this->addFlash('success', 'Votre inscription est bien confirmée');

                return $this->redirectToRoute('app_home');
            }

            // dump($prestataireInscrit->isInscriptConfirmee());
            // dd($prestataireInscrit);

            // a) chercher comment passer l'info prestataire située dans la méthode verifyUserEmail dans la méthode inscription V
            // b) selon la méthode trouvée pour y arriver, il faudra aller chercher en DB les informations du prestataire qui s'est inscrit précédemment
            //     $repository = $entityManager->getRepository(User::class);
            // chercher comment pousser (push) les infos en DB 

            /*FORMULAIRE */
            $form = $this->createForm(PrestataireType::class, $prestataireInscrit);


            /* 
        https://www.comment-devenir-developpeur.com/les-formulaires-sous-symfony-6#:~:text=Dans%20Symfony%2C%20tous%20sont%20des%20%C2%AB%20types%20de,de%20formulaire%20%C2%BB%20%28par%20exemple%2C%20UserProfileType%29.%20%C3%89l%C3%A9ments%20suppl%C3%A9mentaires
        2. Création de classes de formulaire
        Symfony recommande de mettre le moins de logique possible dans les contrôleurs. C’est pourquoi il est préférable de déplacer les formulaires complexes vers des classes dédiées plutôt que de les définir dans les actions du contrôleur. De plus, les formulaires définis dans des classes peuvent être réutilisés dans plusieurs actions et services

        */

            // je récupère les données catégories de ma DB
            $repositoryCategory = $entityManager->getRepository(CategorieServices::class);

            // tableau des catégories
            $categories = $repositoryCategory->findAll();



            // 4. Soumettre le formulaire
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // $form->getData() holds the submitted values
                // but, the original `$task` variable has also been updated
                $task = $form->getData();
                // Yes il tombe dans le dump and dd($task)
                // dump("coucou");
                // dd($task);

                // ... perform some action, such as saving the task to the database
                // persist et flush le prestataire

                // aller chercher le champ dans le Form PrestataireType

                // $prestataire = $form->getData('plainPassword');

                // si je veux récupérer un champ de mon form je dois faire un get sur ce champ et chainer avec la méthode getData()
                $plainPassword = $form->get('plainPassword')->getData();

                // dd($plainPassword); il récupère bien le plainPlassword


                // hash du mot de passe de Verify-email-bundle
                $prestataireInscrit->setPassword(
                    $prestatairePasswordHasher->hashPassword(
                        $prestataireInscrit,
                        $form->get('plainPassword')->getData()
                    )
                );

                // $userRepository->upgradePassword($prestataireInscrit, $plainPassword);
                // Inscription CONFIRMEE
                // Dés que j'ai vérifié que en DB j'ai bien persisté mon Password haché, je vais confirmer mon inscription et settant à TRUE l'inscription confirmée
                $prestataireInscrit->setInscriptConfirmee(true);


                $entityManager->persist($prestataireInscrit);
                $entityManager->flush();

                //  Change the redirect on success and handle or remove the flash message in your templates
                $this->addFlash('success', 'Votre inscription comme PRESTATAIRE est bien validée !');

                // return $this->redirectToRoute('app_home', ['id' => $prestataireInscrit->getId()]);
                return $this->redirectToRoute('app_home');
            }


            // 5.retourner une vue, un fichier TWIG
            return $this->render('registration/inscription.html.twig', [
                'registrationForm' => $form->createView(),
                'categories' => $categories,
            ]);
        } else {

            $this->addFlash('error', 'Votre procédure d\'inscription rencontre un problème, veuillez recommencer !');

            return $this->redirectToRoute('app_home');
        }
    }
}
