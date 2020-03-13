<?php

namespace App\Repository;

use App\Entity\AcademicData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AcademicData|null find($id, $lockMode = null, $lockVersion = null)
 * @method AcademicData|null findOneBy(array $criteria, array $orderBy = null)
 * @method AcademicData[]    findAll()
 * @method AcademicData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AcademicDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AcademicData::class);
    }

    // /**
    //  * @return AcademicData[] Returns an array of AcademicData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AcademicData
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
