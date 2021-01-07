<?php

namespace App\Repository;

use App\Entity\DateAt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DateAt|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateAt|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateAt[]    findAll()
 * @method DateAt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateAtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DateAt::class);
    }

    // /**
    //  * @return DateAt[] Returns an array of DateAt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DateAt
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
