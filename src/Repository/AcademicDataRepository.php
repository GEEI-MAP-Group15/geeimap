<?php

namespace App\Repository;

use App\Entity\AcademicData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\Join;


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


    public function countCollegeScience()
    {
        
        $query = $this->createQueryBuilder('m');
        $query -> select($query->expr()->count('m.college'));
        $query -> where("m.college = 1");
        return (int) $query->getQuery()->getSingleScalarResult();

    }

    public function countCollegeEngineering()
    {
        
        $query = $this->createQueryBuilder('m');
        $query -> select($query->expr()->count('m.college'));
        $query -> where("m.college = 2");
        return (int) $query->getQuery()->getSingleScalarResult();

    }

    public function countUndergraduate()
    {
        
        $query = $this->createQueryBuilder('m');
        $query -> select($query->expr()->count('m.academiclevel'));
        $query -> where("m.academiclevel = 1");
        return (int) $query->getQuery()->getSingleScalarResult();

    }

    public function countPostgraduate()
    {
        
        $query = $this->createQueryBuilder('m');
        $query -> select($query->expr()->count('m.academiclevel'));
        $query -> where("m.academiclevel = 2");
        return (int) $query->getQuery()->getSingleScalarResult();

    }

    public function countMaster()
    {
        
        $query = $this->createQueryBuilder('m');
        $query -> select($query->expr()->count('m.academiclevel'));
        $query -> where("m.academiclevel = 6");
        return (int) $query->getQuery()->getSingleScalarResult();

    }

    public function countPhD()
    {
        
        $query = $this->createQueryBuilder('m');
        $query -> select($query->expr()->count('m.academiclevel'));
        $query -> where("m.academiclevel = 5");
        return (int) $query->getQuery()->getSingleScalarResult();

    }


    public function essai()
    {
    
        $rawSql = "SELECT college_id FROM geeimap.academic_data a JOIN geeimap.college c on a.college_id=c.id WHERE c.name='Science'";

        $stmt = $this->getEntityManager()->getConnection()->prepare($rawSql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }

    public function essai2()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(college_id) FROM geeimap.academic_data a JOIN geeimap.college c on a.college_id=c.id WHERE c.name=:col");
        $statement->bindValue('col', "Science");
        $statement->execute();
        $results = $statement->fetch();

        //$rawSql = "SELECT count(college_id) FROM geeimap.academic_data a JOIN geeimap.college c on a.college_id=c.id WHERE c.name='Science'";

        //$stmt = $this->getEntityManager()->getConnection()->prepare($rawSql)->execute();
        //$result = $stmt->getResult();
        
        return array_shift($results);  
 
    }

    /*public function essai2()
    {
        $result = $this->createQueryBuilder('a')
            ->Select('COUNT(a.college)')
            ->join('a.college', 'c')
            ->where('c.name = :name')
            //->count('a.college_id')
            ->setParameter('name', 'Engineering')
            ->getQuery()
            ->getSingleScalarResult();

        return $result;   
    }*/






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
