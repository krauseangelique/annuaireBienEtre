<?php

namespace App\Repository;

use App\Entity\Prestataire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Console\Descriptor\Descriptor;

/**
 * @extends ServiceEntityRepository<Prestataire>
 *
 * @method Prestataire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prestataire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prestataire[]    findAll()
 * @method Prestataire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrestataireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prestataire::class);
    }

    public function findBy4End(): array
    {
        // récupération des 4 derniers prestataires inscrits dont l'inscription est confirmée - ils ont rempli le formulaire complet
        return $this->createQueryBuilder('p')
        ->orderBy('p.inscription', 'DESC')
        ->where('p.inscriptConfirmee = true')
        ->setMaxResults(4)
        ->getQuery()
        ->getResult()
        ;
    }

    public function findPrestaire($categorieServices, $commune, $adresseCP, $adresseProvince, $nom)
    {
        $queryBuilder = $this->createQueryBuilder('p');
        if($nom !== ""){
        // recherche combinée sur 1 à 5 critères des prestataires
        // https://www.php.net/manual/fr/xsltprocessor.setparameter.php
        $queryBuilder->andwhere('p.nom = :nom')
    
        ->setParameter('nom', $nom); 
        // ->setParameter('nom', '%' .$nom. '%'); // SELECT * FROM Prestataires WHERE nom LIKE '% leNomQueJeRecherche %' 
        }
        if(($categorieServices !== "")){
            $queryBuilder->join('p.categorieServices', 'c')
            ->andWhere('c = :categorieServices')
            ->setParameter('categorieServices', $categorieServices);
        }

        if($commune !== ""){
            $queryBuilder->andWhere('p.commune = :commune')
            ->setParameter('commune', $commune);
        }

        // if($adresseCP !== null){
        //     $queryBuilder->andWhere('p.adresseCP = :adresseCP')
        //     ->setParameter('adresseCP', $adresseCP);
        // }

        // if($adresseProvince !== null){
        //     $queryBuilder->andWhere()('p.adresseProvince = :adresseProvince')
        //     ->setParameter('adresseProvince', $adresseProvince);

        // }

        return $queryBuilder->getQuery()->getResult();
    }

//    /**
//     * @return Prestataire[] Returns an array of Prestataire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Prestataire
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
