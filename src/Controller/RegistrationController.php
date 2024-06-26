<?php

namespace App\Controller;

use App\Entity\CategorieServices;
use App\Entity\Image;
use App\Entity\Internaute;
use App\Entity\Prestataire;
use App\Entity\User;
use App\Form\InternauteType;
use App\Form\PrestataireType;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
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
        $user = new User();
        $prestataire = new Prestataire();
        $internaute = new Internaute();

        // 3. lier le formulaire au controller dans lequel on se trouve
        $form = $this->createForm(RegistrationFormType::class, $user);

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
                2) vérification de la valeur du mail :
                    Est-ce que celle-ci se trouve déjà  en DB ?
                    2a) On a besoin d'une query et une connection PDO en Symfony c'est le 
                    repertoire Repository User et on va utiliser l'EntityManager et on va appeler User repository
                    $repository = $entityManager->getRepository(Prestataire::class); V
                    2b) On va appeler la méthode  findOneBy() du User Repository afin de pouvoir vérifier si l'email est en DB. V
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


            // Si l'email n'est pas en DB
            if ($isMail === null) {
                // si je désire non pas Prestataire mais prestataire ou internaute alors : 

                // Récupération du type d'utilisateur choisi
                $typeUtilisateur = $form->get('typeUtilisateur')->getData();

                // Vérification du type d'utilisateur
                if ($typeUtilisateur === 'prestataire') {
                    // Traitement pour le cas où le prestataire est choisi
                    // Ici, vous pouvez envoyer un email de confirmation spécifique pour les prestataires, par exemple

                    # code...
                    // generate a signed url and email it to the user Prestataire 
                    //  https://github.com/Guichard-Gael/Tuto_mail_Symfony  
                    $this->emailVerifier->sendEmailConfirmation(
                        'app_verify_email',
                        $user,
                        (new TemplatedEmail())
                            ->from(new Address('mailer@your-domain.com', 'Bien Etre'))
                            ->to($user->getEmail())

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
                } elseif ($typeUtilisateur === 'internaute') {
                    // Traitement pour le cas où l'internaute est choisi


                    // generate a signed url and email it to the user Internaute 
                    //  https://github.com/Guichard-Gael/Tuto_mail_Symfony  
                    $this->emailVerifier->sendEmailConfirmation(
                        'app_verify_email_internaute',
                        $user,
                        (new TemplatedEmail())
                            ->from(new Address('mailer@your-domain.com', 'Bien Etre'))
                            ->to($user->getEmail())

                            // Editer en français
                            // ->subject('Please Confirm your Email')
                            ->subject('Pouvez vous confirmer votre adresse mail ?')
                            ->htmlTemplate('registration/confirmation_email.html.twig')
                    );

                    // $entityManager->persist($internaute);
                    // $entityManager->flush(); à remplacer par handleEmailConfirmation en 2ème partie

                    // Après envoie de l'email à la personne qui souhaite s'inscrire
                    $this->addFlash('success', "Un email vous a été envoyé ");

                    // do anything else you need here, like send an email
                    return $this->redirectToRoute('app_register');
                }
            }
            // else si le mail est déjà en DB
            else {

                // message flash
                $this->addFlash('verify_email_error', "votre adresse email existe déjà veuillez vous connecter à votre compte ");

                return $this->redirectToRoute('app_register');
            }
        }


        /* CATEGORIES DE SERVICES */
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
    public function verifyUserEmail(Request $request, TranslatorInterface $translator, EntityManagerInterface $entityManager): Response
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

        // handle  the flash message in your templates
        $this->addFlash('success', 'Votre adresse mail a bien été vérifiée');

        //
        // $this->getUser();
        //dump( $this->getUser());
        //die();

        /* CATEGORIES DE SERVICES */
        // // je récupère les données catégories de ma DB
        // $repositoryCategory = $entityManager->getRepository(CategorieServices::class);

        // // tableau des catégories
        // $categories = $repositoryCategory->findAll();

        // return $this->redirectToRoute('app_home');
        return $this->redirectToRoute('app_inscription', [
            'id' => $prestataire->getId(),
            // 'categories' => $categories,

        ]);
    }

    #[Route('/verifyemailinternaute', name: 'app_verify_email_internaute')]
    public function verifyInternauteEmail(Request $request, TranslatorInterface $translator): Response
    {

        // Comment récupérer l'information dans l' URL    
        //dump($request->query->get('email'));
        //dd($request);
        $email = $request->query->get('email');

        // Création d'un internaute
        $internaute = new Internaute;

        // Les infos de mon INTERNAUTE (formulaire1)
        $internaute->setEmail($email);
        $internaute->setIsVerified(true);
        $internaute->setRoles(['ROLE_INTERNAUTE']);
        $internaute->setTypeUtilisateur('internaute');

        $internaute->setInscription(new DateTime());
        // !!! setInscription pour pouvoir récupérer la date de l'inscription ainsi l'internaute sera inscrit à la date du jour

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            // !!! Si l'email a déjà été soumis (l'email est en DB) alors envoyer un message flash vous avez déjà confirmé votre email pour votre inscription 

            if ($internaute->isVerified() !== true) {

                $this->addFlash('verify_email_error', 'Vous avez déjà confimé votre inscription');
                return $this->redirectToRoute('app_register');
            } else {
                // Gestion de la confirmation du mail
                $this->emailVerifier->handleEmailConfirmation($request, $internaute);
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

        // redirection non pas vers app_inscription qui est le formulaire de finalisation du prestataire mais redirection vers app_inscription_internaute qui est le formulaire de finalisation de l'internaute
        return $this->redirectToRoute('app_inscription_internaute', [
            'id' => $internaute->getId(),

        ]);
    }



    /* Partie 3 : Finalisation de l'inscription PRESTATAIRE */

    //https://symfony.com/doc/current/routing.html#parameters-validation  int $id il passe bien : https://localhost:8000/inscription/28
    // \d+  doit être un NOMBRE pour ne pas qu'on écrive n'importe quoi dans l'URL !!!
    #[
        Route(
            '/inscription/{id}',
            name: 'app_inscription',
            requirements: ['id' => '\d+'],
            defaults: ['id' => 1],
        )
    ]
    // https://symfony.com/doc/current/security.html#the-firewall Table of Contents #The User ° Loading the User: The User Provider ° Registering the User: Hashing Passwords ligne ligne 10 !!!
    // Hash du Password
    public function inscription(Request $request, int $id, EntityManagerInterface $entityManager, UserPasswordHasherInterface $prestatairePasswordHasher, SluggerInterface $slugger): Response
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

            // appel de la méthode isInscriptConfirmee() 
            if ($prestataireInscrit->isInscriptConfirmee() == true) {
                $this->addFlash('success', 'Votre inscription est bien confirmée');

                return $this->redirectToRoute('app_home');
            }
            // dump($prestataireInscrit->isInscriptConfirmee());
            // dd($prestataireInscrit);

            /* FORMULAIRE */
            $form = $this->createForm(PrestataireType::class, $prestataireInscrit);

            /* https://www.comment-devenir-developpeur.com/les-formulaires-sous-symfony-6#:~:text=Dans%20Symfony%2C%20tous%20sont%20des%20%C2%AB%20types%20de,de%20formulaire%20%C2%BB%20%28par%20exemple%2C%20UserProfileType%29.%20%C3%89l%C3%A9ments%20suppl%C3%A9mentaires 
                    */


            /* CATEGORIES */
            // je récupère les données catégories de ma DB
            $repositoryCategory = $entityManager->getRepository(CategorieServices::class);
            // tableau des catégories
            $categories = $repositoryCategory->findAll();


            /* Partie 4. Soumettre le formulaire */

            $form->handleRequest($request);


            if ($form->isSubmitted() && $form->isValid()) {
                // $form->getData() holds the submitted values
                // but, the original `$task` variable has also been updated
                $task = $form->getData();
                // dd($task);  Yesss ça marche ! Ca enregistre !

                // ... perform some action, such as saving the task to the database
                // persist et flush le prestataire

                // aller chercher le champ dans le Form PrestataireType
                // $prestataire = $form->getData('plainPassword');

                // si je veux récupérer un champ de mon form je dois faire un get sur ce champ et chainer avec la méthode getData()
                $plainPassword = $form->get('plainPassword')->getData();
                // dd($plainPassword); // il récupère bien le plainPlassword RegistrationController.php on line 380: "prestataire30"

                /* https://github.com/SymfonyCasts/verify-email-bundle#Overview lire le README et faire : 
                    composer require symfonycasts/verify-email-bundle */

                // hash du mot de passe de Verify-email-bundle
                $prestataireInscrit->setPassword(
                    $prestatairePasswordHasher->hashPassword(
                        // 
                        $prestataireInscrit,
                        $form->get('plainPassword')->getData() // c'est le $plainPassword donc le $plaintextPassword ligne 14 de https://symfony.com/doc/current/security.html#the-firewall Table of Contents #The User ° loading the User: ° Registering the User: Hashing Passwords
                    )
                );

                // $userRepository->upgradePassword($prestataireInscrit, $plainPassword);
                // Inscription CONFIRMEE
                // Dés que j'ai vérifié que en DB j'ai bien persisté mon Password haché, je vais confirmer mon inscription en settant à TRUE l'inscription confirmée
                $prestataireInscrit->setInscriptConfirmee(true);


                /* LES IMAGES */
                // Logo du Prestataire
                $prestataireLogoFile = $form->get('logo')->getData();
                if(isset($prestataireLogoFile)){

            
                    // Maintenant je dois traiter mon fichier : la première action à effectuer lors du chargement d'un fichier transmis par un utilisateur est de vérifier sa validité.Ici on le vérifiera via la méthode  isValid() p312 pdf Symfony5
                    if ($prestataireLogoFile->isValid()) {

                        // SI l'image (le fichier) EXISTE alors on traite l'image @TODO !!! isset() - Détermine si une variable est déclarée et est différente de null https://www.php.net/manual/fr/function.isset.php Est-ce que je dois l'utiliser ici au cas où le prestataire ne proposerait pas d'image de logo pour le représenter dans la 2ème partie du formulaire
                    
                        $originalFilename = pathinfo($prestataireLogoFile->getClientOriginalName(), PATHINFO_FILENAME);
                        // this is needed to safely include the file name as part of the URL
                        $safeFilename = $slugger->slug($originalFilename);

                        $newFilename = $safeFilename . '-' . uniqid() . '.' .
                            pathinfo($prestataireLogoFile->getClientOriginalName(), PATHINFO_EXTENSION);

                        // pour capturer les erreurs
                        try {
                            // je vais enregistrer mon fichier p313 du pdf eni Symfony5
                            $prestataireLogoFile->move('images/logoPrestataire', $newFilename);
                        } catch (FileException $e) {
                            // ... handle exception if something happens during file upload
                            exit("upload non réussi");
                        }

                        // création d'un objet LOGO
                        $logo = new Image;

                        $logo->setImage($newFilename);
                        // je passe les données de l'objet
                        $logo->setPrestataire($prestataireInscrit);
                    }
                    // On va utiliser l'Entity manager pour persit les données (préparation de la requête) et flush pour mettre en DB (exécution de la requête)
                    $entityManager->persist($logo);

                }

                $entityManager->persist($prestataireInscrit);
                $entityManager->flush();



                //  Change the redirect on success and handle or remove the flash message in your templates
                $this->addFlash('success', 'Votre inscription comme PRESTATAIRE est bien validée !');

                /* CATEGORIES DE SERVICES */
                // je récupère les données catégories de ma DB
                $repositoryCategory = $entityManager->getRepository(CategorieServices::class);

                // tableau des catégories
                $categories = $repositoryCategory->findAll();

                /* Je vais faire une autre route pour ne pas rediriger vers app_home mais app_DetailInscription  vers app_login*/
                //return $this->redirectToRoute('app_home');
                // app_DetailInscriptionPrestataire
                return $this->redirectToRoute(
                    'app_login',
                    // je n'ai pas à passer les informations du Prestataire en get donc pas 'id' ni 'categories'
                    // [
                    //     'id' => $prestataireInscrit->getId(),
                    //     'categories' => $categories,
                    // ]
                );
            }


            /* Partie 5.retourner une vue, un fichier TWIG */
            return $this->render('registration/inscription.html.twig', [
                'registrationForm' => $form->createView(),
                'categories' => $categories,
            ]);
        } else {
            $this->addFlash('error', 'Votre procédure d\'inscription rencontre un problème, veuillez recommencer !');

            return $this->redirectToRoute('app_home');
        }
    }
    /* Partie 4 DETAIL fiche inscription prestataire*/
    #[Route(
        '/fininscriptionprestataire/{id}',
        name: 'app_DetailInscriptionPrestataire',
        requirements: ['id' => '\d+'],
        defaults: ['id' => 1],
    )]
    public function detailInscriptionPrestataire(Prestataire $prestataire, EntityManagerInterface $entityManager): Response
    {

        /* CATEGORIES DE SERVICES */
        // je récupère les données catégories de ma DB
        $repositoryCategory = $entityManager->getRepository(CategorieServices::class);

        // tableau des catégories
        $categories = $repositoryCategory->findAll();

        /* Partie 5.retourner une vue, un fichier TWIG pour la finalisation de l'inscription */
        return $this->render('registration/detailinscriptionprestataire.html.twig', [
            'prestataire' => $prestataire,
            'categories' => $categories,
        ]);
    }

    /* Partie 3 Finalisation de l'inscription Internaute */
    // id' => '\d+ l'id doit être un chiffre
    #[Route(
        '/inscriptioninternaute/{id}',
        name: 'app_inscription_internaute',
        requirements: ['id' => '\d+'],
        defaults: ['id' => 1],
    )]

    // Hash du Password
    public function inscriptioninternaute(Request $request, int $id, EntityManagerInterface $entityManager, UserPasswordHasherInterface $internautePasswordHasher): Response
    {
        // Récupération de l'id
        $userRepository = $entityManager->getRepository(User::class);

        // Récupération du paramètre de l'url ici l'id
        $internauteInscrit = $userRepository->findOneBy(['id' => $id]);

        if ($id >= 1) {

            // confirmation de l'inscription
            if ($internauteInscrit->isInscriptConfirmee() == true) {
                // message flash
                $this->addFlash('success', 'Votre inscription comme internaute est confirmée !');

                return $this->redirectToRoute('app_home');
            }

            /* FORMULAIRE */
            $formInternaute = $this->createForm(InternauteType::class, $internauteInscrit);

            $formInternaute->handleRequest($request);

            if ($formInternaute->isSubmitted() && $formInternaute->isValid()) {

                $task = $formInternaute->getData();


                $plainPassword = $formInternaute->get('plainPassword')->getData();
                // hash du mot de passe Verify email bundle
                $internauteInscrit->setPassword(
                    $internautePasswordHasher->hashPassword(
                        $internauteInscrit,
                        $formInternaute->get('plainPassword')->getData()
                    )
                );

                // Si Password haché est bien en DB alors je confirme l'inscription en settant à TRUE
                $internauteInscrit->setInscriptConfirmee(true);

                $entityManager->persist($internauteInscrit);
                $entityManager->flush();

                // Message flash de success
                $this->addFlash('success', 'Votre inscription comme INTERNAUTE est bien validée');

                // @TODO voir si c'est ici que je dois modifier la route !!!
                return $this->redirectToRoute(
                    'app_DetailInscriptionInternaute',
                    ['id' => $internauteInscrit->getId()],
                );
            }
            $categories = $entityManager->getRepository(CategorieServices::class)->findAll();

            /* Partie 5.retourner une vue, un fichier TWIG */
            return $this->render('registration/inscriptioninternaute.html.twig', [
                'registrationForm' => $formInternaute->createView(),
                'categories' => $categories,

            ]);
        } else {
            $this->addFlash('error', 'Votre procédure d\'inscription a rencontré un problème, veuillez recommencer');

            return $this->redirectToRoute('app_home');
        }
    }

    /* Partie 4 Détail fiche inscription internaute */
    #[Route(
        '/fininscriptionInternaute/{id}',
        name: 'app_DetailInscriptionInternaute',
        requirements: ['id' => '\d+'],
        defaults: ['id' => 1],
    )]
    public function detailInscriptionInternaute(Internaute $internaute): Response
    {
        /* Partie 5.retourner une vue, un fichier TWIG pour la finalisation de l'inscription internaute */
        return $this->render('registration/detailinscriptionInternaute.html.twig', [
            'internaute' => $internaute,

        ]);
    }
}
