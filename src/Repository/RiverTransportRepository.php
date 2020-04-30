<?php

namespace App\Repository;

use App\Entity\RiverTransport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RiverTransport|null find($id, $lockMode = null, $lockVersion = null)
 * @method RiverTransport|null findOneBy(array $criteria, array $orderBy = null)
 * @method RiverTransport[]    findAll()
 * @method RiverTransport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RiverTransportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RiverTransport::class);
    }

    // /**
    //  * @return RiverTransport[] Returns an array of RiverTransport objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RiverTransport
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
