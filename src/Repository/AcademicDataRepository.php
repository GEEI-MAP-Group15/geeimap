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


    public function applicantCollege()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT distinct college_id, count(college_id) as b FROM geeimap.academic_data GROUP BY college_id");
        $statement->execute();
        $results = $statement->fetchAll();

        
        return $results;  
 
    }

    public function applicantCollegeId()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT college_id FROM geeimap.academic_data");
        $statement->execute();
        $results = $statement->fetchAll();

        
        return $results;  
 
    }

    public function collegeId()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT id FROM geeimap.college");
        $statement->execute();
        $results = $statement->fetchAll();

        
        return $results;  
 
    }

    public function collegeCapacity()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT capacity FROM geeimap.college");
        $statement->execute();
        $results = $statement->fetchAll();

        
        return $results;  
 
    }


    /*public function countCollegeScience()
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
    }*/



    public function applicantAcademiclevel()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT distinct academiclevel_id, count(academiclevel_id) as b FROM geeimap.academic_data GROUP BY academiclevel_id");
        $statement->execute();
        $results = $statement->fetchAll();

        
        return $results;  
 
    }

    public function applicantAcademiclevelId()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT academiclevel_id FROM geeimap.academic_data");
        $statement->execute();
        $results = $statement->fetchAll();

        
        return $results;  
 
    }

    public function academiclevelId()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT id FROM geeimap.academic_level");
        $statement->execute();
        $results = $statement->fetchAll();

        
        return $results;  
 
    }

    public function academiclevelCapacity()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT capacity FROM geeimap.academic_level");
        $statement->execute();
        $results = $statement->fetchAll();

        
        return $results;  
 
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


    public function degreeCapacity()
    {

        
        $em = $this->getEntityManager(); // ...or getEntityManager() prior to Symfony 2.1
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT capacity FROM geeimap.degree");
        $statement->execute();
        $results = $statement->fetchAll();

        
        return $results;  
 
    }



    // /**
    //  * @return AcademicData[] Returns an array of AcademicData objects
    //  */
    
}
