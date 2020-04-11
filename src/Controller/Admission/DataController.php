<?php

namespace App\Controller\Admission;

use App\Entity\Application;
use App\Entity\Degree;
use App\Entity\AcademicData;
use App\Entity\AcademicLevel;
use App\Entity\Background;
use App\Entity\College;
use App\Entity\Document;
use App\Entity\Module;
use App\Entity\Student;
use App\Entity\User;
use App\Repository\ApplicationRepository;
use App\Repository\DegreeRepository;
use App\Repository\AcademicDataRepository;
use App\Repository\AcademicLevelRepository;
use App\Repository\BackgroundRepository;
use App\Repository\CollegeRepository;
//use App\Repository\DocumentRepository;
use App\Repository\ModuleRepository;
use App\Repository\StudentRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admission/data")
 */
class DataController extends AbstractController
{
    /**
     * @Route("/", name="data_index", methods={"GET"})
     */
    public function index(ApplicationRepository $applicationRepository, DegreeRepository $degreeRepository, AcademicDataRepository $academicDataRepository, AcademicLevelRepository $academicLevelRepository, BackgroundRepository $backgroundRepository, CollegeRepository $collegeRepository, /*DocumentRepository $documentRepository,*/ ModuleRepository $moduleRepository, StudentRepository $studentRepository, UserRepository $userRepository): Response
    {
        
        $applicantdegree = $academicDataRepository->applicantDegree();
        $applicantdegreeid = $academicDataRepository->applicantDegreeId();
        $degree = $degreeRepository->findAll();
        $degreeid = $academicDataRepository->degreeId();

        //$a = array(1,2,3,4);

        foreach ($degreeid as $value) { 

            $i = 0;
            $tab = array();

            while ($i <= count($value))
            { 

                if (in_array($degreeid[$i], $applicantdegreeid)) {
                    
                    $tab[$i] = $degree[$i];
                }

                else {

                    $tab[$i] = 0;
                }

                $i ++;

               //return $tab;
            }
            
            //return $tab;
        }


        return $this->render('admission/data/index.html.twig', [
            'applications' => $applicationRepository->findAll(),
            'countapp' => $applicationRepository->countApplication(),
            'degrees' => $degreeRepository->findAll(),
            'academicdatas' => $academicDataRepository->findAll(),
            'academiclevels' => $academicLevelRepository->findAll(),
            'backgounds' => $backgroundRepository->findAll(),
            'colleges' => $collegeRepository->findAll(),
            'countcollscience' => $academicDataRepository->countCollegeScience(),
            'countcollengineering' => $academicDataRepository->countCollegeEngineering(),
            //'documents' => $documentRepository->findAll(),
            'modules' => $moduleRepository->findAll(),
            'students' => $studentRepository->findAll(),
            'countstu' => $studentRepository->countStudent(),
            'users' => $userRepository->findAll(),
            'countundergraduate' => $academicDataRepository->countUndergraduate(),
            'countpostgraduate' => $academicDataRepository->countPostgraduate(),
            'countmaster' => $academicDataRepository->countMaster(),
            'countphd' => $academicDataRepository->countPhD(),
            'applicantdegree' => $academicDataRepository->applicantDegree(),
            'applicantdegreeid' => $academicDataRepository->applicantDegreeId(),
            'countindegree'=> $tab,
            
        ]);
    }


    /*public function countDegreeApplication(AcademicDataRepository $academicDataRepository, DegreeRepository $degreeRepository)
    {
        //$applicantdegree = $academicDataRepository->applicantDegree();
        //$applicantdegreeid = $academicDataRepository->applicantDegreeId();
        //$degree = $degreeRepository->findAll();

        $b = array(1,2,3,4);

        foreach ($b as $key => $value) {
             
            //echo "{$key} => {$value} ";
            $a = print_r($b);

         } 

        return $this->render(
            'admission/data/index.html.twig',
            ['countindegree'=>$a]
        );
    }*/


}