<?php

namespace App\Repository;

use App\Entity\WaterTransport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WaterTransport|null find($id, $lockMode = null, $lockVersion = null)
 * @method WaterTransport|null findOneBy(array $criteria, array $orderBy = null)
 * @method WaterTransport[]    findAll()
 * @method WaterTransport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WaterTransportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WaterTransport::class);
    }

    // /**
    //  * @return WaterTransport[] Returns an array of WaterTransport objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WaterTransport
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
