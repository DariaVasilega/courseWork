<?php

namespace App\Repository;

use App\Entity\MaritimeTransport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MaritimeTransport|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaritimeTransport|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaritimeTransport[]    findAll()
 * @method MaritimeTransport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaritimeTransportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaritimeTransport::class);
    }

    // /**
    //  * @return MaritimeTransport[] Returns an array of MaritimeTransport objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MaritimeTransport
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
