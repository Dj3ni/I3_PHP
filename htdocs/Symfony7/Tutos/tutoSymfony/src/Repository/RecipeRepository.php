<?php

namespace App\Repository;

use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recipe>
 */
class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipe::class);
    }

    /**
    * @return Recipe[] Returns an array of Recipe objects
    */
    public function findWithDurationLowerThan(int $duration): array
    {
        return $this->createQueryBuilder('r')
                    ->where("r.duration <= :duration") //Trouve toutes les recettes dont la durée<$duration
                    ->orderBy("r.duration","ASC") //
                    ->setMaxResults(5) //affiche que x résultats
                    ->setParameter("duration", $duration) //va configurer les paramètres de la requête
                    ->getQuery() //envoie la requête
                    ->getResult(); //va chercher le résultat
    }

    public function findTotalDuration():int
    {
        return $this->createQueryBuilder('r')
                    ->select('SUM(r.duration) as total')
                    ->getQuery()
                    ->getSingleScalarResult();
    }
    //    
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Recipe
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
