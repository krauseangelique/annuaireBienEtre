<?php

namespace App\Controller;

use App\Entity\CodePostal;
use App\Entity\Commune;
use App\Entity\Province;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdressController extends AbstractController
{
    #[Route('/adress', name: 'app_adress')]
    public function index(EntityManagerInterface $manager): Response
    {
        // Vérification de l'existence de données dans les tables pour les adresses
        // Faire appel aux Repositories des 3 tables (in https://laconsole.dev/formations/symfony/manipulation-entites)
        $repository_province = $manager->getRepository(Province::class);
        $repository_codePostal = $manager->getRepository(CodePostal::class);
        $repository_commune = $manager->getRepository(Commune::class);

        // récupération de tous les items des tables
        $provinces = $repository_province->findAll();
        $codePostals = $repository_codePostal->findAll();
        $communes = $repository_commune->findAll();

        // dd($provinces);
        if ((empty($provinces) or (empty($communes)) or (empty($codePostals)))) {
            // populer les tables Province Commune et Code Postal

            // Insertion du fichier Region-Ville-CodePostal.json accordion
            // $_SERVER['SERVER_NAME'] c'est le localhost et après ce sera le serveur distant
            // $file = "http://" . $_SERVER['SERVER_NAME'] . 'Region-Ville-CodePostal.json'; // si votre protocole est http, si votre protocole est https // chemin absolu
            $file = 'Region-Ville-CodePostal.json'; // chemin relatif


            // file_get_contents() est la façon recommandée pour lire le contenu d'un fichier dans une chaîne de caractères. (in php.net)
            $data = file_get_contents($file);

            // décodage du fichier JSON en un tableau
            $obj = json_decode($data);
            // dd($obj); // me donne bien un array de 660 élements

            foreach ($obj as $key => $value) {
                // hydratation des tables
                $codepostals = new CodePostal();
                $commune = new Commune();
                $provinces = new Province();

                $codepostals->setCodePostal($value->codePostal);
                $commune->setCommune($value->ville);
                $provinces->setProvince($value->region);


                // Persistance des données via ObjectManager
                $manager->persist($codepostals);
                $manager->persist($commune);
                $manager->persist($provinces);
            }

            $manager->flush();
        }

        return $this->render('adress/index.html.twig', [

            // Nom du Controller
            'controller_name' => 'AdressController',

        ]);
    }
}
