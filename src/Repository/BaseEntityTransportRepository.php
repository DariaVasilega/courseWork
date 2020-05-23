<?php

namespace App\Repository;

use App\Entity\BaseEntityTransport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BaseEntityTransport|null find($id, $lockMode = null, $lockVersion = null)
 * @method BaseEntityTransport|null findOneBy(array $criteria, array $orderBy = null)
 * @method BaseEntityTransport[]    findAll()
 * @method BaseEntityTransport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BaseEntityTransportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BaseEntityTransport::class);
    }

    // /**
    //  * @return BaseEntityTransport[] Returns an array of BaseEntityTransport objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BaseEntityTransport
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
