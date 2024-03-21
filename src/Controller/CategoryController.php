<?php 
namespace App\Controller;

use App\Entity\CategorieServices;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    // #[Route('/test2', name: 'app_test2')] // la route test2 permet de visualisé la liste des Categories mais comme on va inclure cette liste dans base.html.twig, la route ne sera plus utilisée et donc je peux la commenter.
    
    /**
     * @function listeCategory : liste les catégories de services
     */
    public function listeCategory(Request $request, EntityManagerInterface $entityManager): Response
    {

    /* CATEGORIES DE SERVICES d'un PRESTATAIRE*/
        // je récupère les données catégories de ma DB
        $repositoryCategory = $entityManager->getRepository(CategorieServices::class);

        // tableau des catégories
        $categories = $repositoryCategory->findAll();

        

        return $this->render('category/listeCategory.html.twig', [
    
            'categories' => $categories,
        ]);    
    }

    #[Route('/category/detail/{id}', name: 'app_detail_category')] 
    public function detailCategory(CategorieServices $category, EntityManagerInterface $entityManager): Response
    {

    

        return $this->render('category/detailCategory.html.twig', [
    
            'categorie' => $category,
        ]);    
    }

}