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
        
        //degree data for decision

        $applicantdegree = $academicDataRepository->applicantDegree();
        $applicantdegreeid = $academicDataRepository->applicantDegreeId();
        $degrees = $degreeRepository->findAll();
        $degreeid = $academicDataRepository->degreeId();
        $countdegreeid = count($degreeid);

        $tabdegree = array();
        $tabdegreeid = array();
        $degreecapacities = array();
        $degreename = array();
        $degreeenrolled = array();

        for ($j=0; $j < count($applicantdegreeid); $j++) {
                
            array_push($tabdegreeid, $applicantdegreeid[$j]["degree_id"]);
        }

        for ($i=0; $i < $countdegreeid; $i++) { 

            array_push($degreecapacities, $degrees[$i]->getCapacity());
            array_push($degreename, $degrees[$i]->getName());
            array_push($degreeenrolled, $degrees[$i]->getEnrolledstudent());

            if (in_array($degreeid[$i]["id"], $tabdegreeid)) {
                
                for ($n=0; $n < count($applicantdegree); $n++){
                    if ($degreeid[$i]["id"]==$applicantdegree[$n]["degree_id"]) {
                        array_push($tabdegree, $applicantdegree[$n]["b"]);
                    }
                } 
            }

            else {

                array_push($tabdegree, "0");
            }
        }

        //college for data decision

        $applicantcollege = $academicDataRepository->applicantCollege();
        $applicantcollegeid = $academicDataRepository->applicantCollegeId();
        $colleges = $collegeRepository->findAll();
        $collegeid = $academicDataRepository->collegeId();
        $countcollegeid = count($collegeid);

        $tabcollege = array();
        $tabcollegeid = array();
        $collegecapacities = array();
        $collegename = array();
        $collegeenrolled = array();

        for ($j=0; $j < count($applicantcollegeid); $j++) {
                
            array_push($tabcollegeid, $applicantcollegeid[$j]["college_id"]);
        }

        for ($i=0; $i < $countcollegeid; $i++) { 

            array_push($collegecapacities, $colleges[$i]->getCapacity());
            array_push($collegename, $colleges[$i]->getName());
            array_push($collegeenrolled, $colleges[$i]->getEnrolledstudent());

            if (in_array($collegeid[$i]["id"], $tabcollegeid)) {
                
                for ($n=0; $n < count($applicantcollege); $n++){
                    if ($collegeid[$i]["id"]==$applicantcollege[$n]["college_id"]) {
                        array_push($tabcollege, $applicantcollege[$n]["b"]);
                    }
                } 
            }

            else {

                array_push($tabcollege, "0");
            }
        }

        //academic level for data decision

        $applicantacademiclevel = $academicDataRepository->applicantAcademiclevel();
        $applicantacademiclevelid = $academicDataRepository->applicantAcademiclevelId();
        $academiclevels = $academicLevelRepository->findAll();
        $academiclevelid = $academicDataRepository->academiclevelId();
        $countacademiclevelid = count($academiclevelid);

        $tabacademiclevel = array();
        $tabacademiclevelid = array();
        $academiclevelcapacities = array();
        $academiclevelname = array();
        $academiclevelenrolled = array();

        for ($j=0; $j < count($applicantacademiclevelid); $j++) {
                
            array_push($tabacademiclevelid, $applicantacademiclevelid[$j]["academiclevel_id"]);
        }

        for ($i=0; $i < $countacademiclevelid; $i++) { 

            array_push($academiclevelcapacities, $academiclevels[$i]->getCapacity());
            array_push($academiclevelname, $academiclevels[$i]->getName());
            array_push($academiclevelenrolled, $academiclevels[$i]->getEnrolledstudent());

            if (in_array($academiclevelid[$i]["id"], $tabacademiclevelid)) {
                
                for ($n=0; $n < count($applicantacademiclevel); $n++){
                    if ($academiclevelid[$i]["id"]==$applicantacademiclevel[$n]["academiclevel_id"]) {
                        array_push($tabacademiclevel, $applicantacademiclevel[$n]["b"]);
                    }
                } 
            }

            else {

                array_push($tabacademiclevel, "0");
            }
        }


        return $this->render('admission/data/index.html.twig', [
            'applications' => $applicationRepository->findAll(),
            'countapp' => $applicationRepository->countApplication(),
            'degrees' => $degreeRepository->findAll(),
            'academicdatas' => $academicDataRepository->findAll(),
            'academiclevels' => $academicLevelRepository->findAll(),
            'backgounds' => $backgroundRepository->findAll(),
            'colleges' => $collegeRepository->findAll(),
            //'countcollscience' => $academicDataRepository->countCollegeScience(),
            //'countcollengineering' => $academicDataRepository->countCollegeEngineering(),
            //'documents' => $documentRepository->findAll(),
            'modules' => $moduleRepository->findAll(),
            'students' => $studentRepository->findAll(),
            'countstu' => $studentRepository->countStudent(),
            'users' => $userRepository->findAll(),
            //'countundergraduate' => $academicDataRepository->countUndergraduate(),
            //'countpostgraduate' => $academicDataRepository->countPostgraduate(),
            //'countmaster' => $academicDataRepository->countMaster(),
            //'countphd' => $academicDataRepository->countPhD(),
            
            'applicantdegree' => $academicDataRepository->applicantDegree(),
            'applicantdegreeid' => $academicDataRepository->applicantDegreeId(),
            'nbstudentindegree'=> $tabdegree, 
            'countdegreeid' => $countdegreeid,
            'degreecapacities' => $degreecapacities,
            'degreenames' => $degreename,
            'degreeenrolled' => $degreeenrolled,

            'applicantcollege' => $academicDataRepository->applicantCollege(),
            'applicantcollegeid' => $academicDataRepository->applicantCollegeId(),
            'nbstudentincollege'=> $tabcollege, 
            'countcollegeid' => $countcollegeid,
            'collegecapacities' => $collegecapacities,
            'collegenames' => $collegename,
            'collegeenrolled' => $collegeenrolled,

            'applicantacademiclevel' => $academicDataRepository->applicantAcademiclevel(),
            'applicantacademiclevelid' => $academicDataRepository->applicantAcademiclevelId(),
            'nbstudentinacademiclevel'=> $tabacademiclevel, 
            'countacademiclevelid' => $countacademiclevelid,
            'academiclevelcapacities' => $academiclevelcapacities,
            'academiclevelnames' => $academiclevelname,
            'academiclevelenrolled' => $academiclevelenrolled,


            
        ]);
    }


}