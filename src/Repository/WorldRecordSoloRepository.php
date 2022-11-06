<?php

namespace App\Repository;

use App\Entity\WorldRecordSolo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WorldRecordSolo|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorldRecordSolo|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorldRecordSolo[]    findAll()
 * @method WorldRecordSolo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorldRecordSoloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorldRecordSolo::class);
    }

    // /**
    //  * @return WorldRecordSolo[] Returns an array of WorldRecordSolo objects
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
    public function findOneBySomeField($value): ?WorldRecordSolo
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
