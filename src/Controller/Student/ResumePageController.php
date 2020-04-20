<?php

namespace App\Controller\Student;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ApplicationRepository;
use App\Repository\DocumentRepository;

/**
 * @Route("/student", methods={"GET"})
*/
class ResumePageController extends AbstractController
{
    /**
     * @Route("/", name="student_index")
     */
    public function index(ApplicationRepository $applicationRepository, DocumentRepository $documentRepository): Response
    {
    	$tempid = $this->getUser()->getStudent();
        if ($this->getUser()->getStudent()== null) {
            return $this->redirectToRoute("formulaire");
        };
        if ($tempid != null) {
           $tempid =  $this->getUser()->getStudent()->getApplication()->getId();
        }
        
    	$application = $applicationRepository->findBy([
    		'id' => $tempid
    	]);
        return $this->render('student/index.html.twig', [
            'application' => $application,
            'documents' => $documentRepository->findBy(
                ['student' => $this->getUser()->getStudent()->getId()])
        ]);
    }
}
