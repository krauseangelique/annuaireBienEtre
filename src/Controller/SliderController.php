<?php 
namespace App\Controller;

use App\Entity\Image;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class SliderController extends AbstractController{

/**
 * @function listeImage : liste les images du slider (géré par l'admin)
 */
    public function listeImage(EntityManagerInterface $entityManager){
        // je récupère les images de ma DB
        $repositoryImage = $entityManager->getRepository(Image::class);

        // requête SPECIFIQUE (PAS logo - ici SLIDER)
    
        // je souhaite récupérer les images dont le nom représenté par la variable $image commence par pexels (endby beginby startwith )
         // Je vais devoir faire une requête personnalisée car startwith n'existe pas dans les critères et je le fait dans le repository (function startWith(){})
        
        $images_slider = $repositoryImage->startWith();

        // retourner les images pour les récupérer dans le slider
        return $this->render('/image/slider.html.twig', [
            
            // je récupère ma variable $images_slider
            'images' => $images_slider,
        ]);
    }

}