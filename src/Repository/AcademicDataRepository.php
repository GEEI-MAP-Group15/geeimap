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

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(college_id) FROM geeimap.academic_data a JOIN geeimap.college c on a.college_id=c.id WHERE c.name=:col");
        $statement->bindValue('col', "Science");
        $statement->execute();
        $results = $statement->fetch();

        
        return array_shift($results);  
 
    }


    public function countCollegeEngineering()
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
    }

    /*public function countUndergraduate()
    {
        
        $query = $this->createQueryBuilder('m');
        $query -> select($query->expr()->count('m.academiclevel'));
        $query -> where("m.academiclevel = 1");
        return (int) $query->getQuery()->getSingleScalarResult();

    }*/

    public function countUndergraduate()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(academiclevel_id) FROM geeimap.academic_data a JOIN geeimap.academic_level c on a.academiclevel_id=c.id WHERE c.name=:al OR c.name=:al2 OR c.name=:al3");
        $statement->bindValue('al', "Undergraduate");
        $statement->bindValue('al2', "undergraduate");
        $statement->bindValue('al3', "Under Graduate");
        $statement->execute();
        $results = $statement->fetch();

        
        return array_shift($results);  
 
    }

    /*public function countPostgraduate()
    {
        
        $query = $this->createQueryBuilder('m');
        $query -> select($query->expr()->count('m.academiclevel'));
        $query -> where("m.academiclevel = 2");
        return (int) $query->getQuery()->getSingleScalarResult();

    }*/

    public function countPostgraduate()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(academiclevel_id) FROM geeimap.academic_data a JOIN geeimap.academic_level c on a.academiclevel_id=c.id WHERE c.name=:al OR c.name=:al2 OR c.name=:al3");
        $statement->bindValue('al', "Postgraduate");
        $statement->bindValue('al2', "postgraduate");
        $statement->bindValue('al3', "Post Graduate");
        $statement->execute();
        $results = $statement->fetch();

        
        return array_shift($results);  
 
    }

    /*public function countMaster()
    {
        
        $query = $this->createQueryBuilder('m');
        $query -> select($query->expr()->count('m.academiclevel'));
        $query -> where("m.academiclevel = 6");
        return (int) $query->getQuery()->getSingleScalarResult();

    }*/

    public function countMaster()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(academiclevel_id) FROM geeimap.academic_data a JOIN geeimap.academic_level c on a.academiclevel_id=c.id WHERE c.name=:al OR c.name=:al2 OR c.name=:al3");
        $statement->bindValue('al', "MSc");
        $statement->bindValue('al2', "Master");
        $statement->bindValue('al3', "master");
        $statement->execute();
        $results = $statement->fetch();

        
        return array_shift($results);  
 
    }

    /*public function countPhD()
    {
        
        $query = $this->createQueryBuilder('m');
        $query -> select($query->expr()->count('m.academiclevel'));
        $query -> where("m.academiclevel = 5");
        return (int) $query->getQuery()->getSingleScalarResult();

    }*/


    public function countPhD()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT count(academiclevel_id) FROM geeimap.academic_data a JOIN geeimap.academic_level c on a.academiclevel_id=c.id WHERE c.name=:al OR c.name=:al1 OR c.name=:al2");
        $statement->bindValue('al', "PhD");
        $statement->bindValue('al1', "phd");
        $statement->bindValue('al2', "PHD");
        $statement->execute();
        $results = $statement->fetch();

        
        return array_shift($results);  
 
    }


    public function applicantDegree()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT distinct degree_id, count(degree_id) as b FROM geeimap.academic_data GROUP BY degree_id");
        $statement->execute();
        $results = $statement->fetchAll();

        
        return $results;  
 
    }

    public function applicantDegreeId()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT degree_id FROM geeimap.academic_data");
        $statement->execute();
        $results = $statement->fetchAll();

        
        return $results;  
 
    }

    public function degreeId()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT id FROM geeimap.degree");
        $statement->execute();
        $results = $statement->fetchAll();

        
        return $results;  
 
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
