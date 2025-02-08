<?php

namespace App\Controller;

use App\Entity\CategorieServices;
use App\Repository\CategorieServicesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class CreateCategoryController extends AbstractController
{
    
    #[Route('/create/category', name: 'app_create_category')]    
    /**
     * index Permet d'insérer des données de type catégorie dans la base de données dans la table category_service
     *
     * @param  mixed $slugger permet de retourner une URL plus lisible pour l'utilisateur
     * @param  mixed $manager permet de gérer l'appel au repository et la persistance des données
     * @return Response affiche une phrase de bon déroulement des opérations en indiquant que les données sont bien insérées en DB
     */
    public function index(SluggerInterface $slugger, EntityManagerInterface $manager): Response
    {


        $repository = $manager->getRepository(CategorieServices::class);
        $itemsCategory = $repository->findAll();

        if (empty($itemsCategory)) {
        
            // mise à jour de la table categorie avec ajout des données


            $categories = [
                [
                    'category_name' => 'barbier',
                    'description' => 'barbier description',
                    'mise_en_avant' => false,
                    'valide' => true,
                    'image_id' => null
                ],
                [
                    'category_name' => 'coiffeur',
                    'description' => 'coiffeur description',
                    'mise_en_avant' => false,
                    'valide' => true,
                    'image_id' => null
                ],
                [
                    'category_name' => 'esthétique',
                    'description' => 'esthétique description',
                    'mise_en_avant' => false,
                    'valide' => true,
                    'image_id' => null
                ],
                [
                    'category_name' => 'massage',
                    'description' => 'massage description',
                    'mise_en_avant' => false,
                    'valide' => true,
                    'image_id' => null
                ],
                [
                    'category_name' => 'medecines douces',
                    'description' => 'medecines douces description',
                    'mise_en_avant' => false,
                    'valide' => true,
                    'image_id' => null
                ],
                [
                    'category_name' => 'pedicure',
                    'description' => 'pedicure description',
                    'mise_en_avant' => false,
                    'valide' => true,
                    'image_id' => null
                ],

            ];

            foreach ($categories as $key => $value) {

                // CategorieServices représente l'Entity
                $obj = new CategorieServices();

                $obj->setNom($value['category_name']);
                $obj->setDescription($value['description']);
                $obj->setEnAvant($value['mise_en_avant']);
                $obj->setValide($value['valide']);
                $obj->setImage($value['image_id']);
                // appel de la methode slug de l'objet SluggerInterface
                $obj->setSlug($slugger->slug($value['category_name']));

                $manager->persist($obj);
            }

            $manager->flush();
        }



        return $this->render('create_category/index.html.twig', [
            

        ]);
    }
}
