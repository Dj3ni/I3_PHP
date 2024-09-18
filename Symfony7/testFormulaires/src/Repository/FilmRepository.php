<?php

namespace App\Repository;

use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Film>
 */
class FilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Film::class);
    
    }

    public function filmEntreDeuxDurees(array $filters):array{
        $em = $this->getEntityManager();
        // Avec ceci, on obtient tous les livres
        // $query = $em->createQuery("SELECT film.duree FROM App\Entity\Film film");

        // Avec ceci, on obtient en fonction de la durée 
        $query = $em->createQuery("SELECT film.duree FROM App\Entity\Film film WHERE film.duree BETWEEN :dureeMin AND :dureeMax");
        $query->setParameter(":dureeMin", $filters["dureeMin"]);
        $query->setParameter(":dureeMax", $filters["dureeMax"]);
        $films = $query->getResult();
        return($films);
    }


    public function filmParTitre(array $filter){
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT film.titre FROM App\Entity\Film film WHERE film.titre LIKE :titre");
        $query->setParameter(":titre", "%".$filter["titre"]."%");
        $films = $query->getResult();
        return($films);
    }

//    /**
//     * @return Film[] Returns an array of Film objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Film
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
