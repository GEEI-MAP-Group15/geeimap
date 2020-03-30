<?php

namespace App\Controller\Student;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ApplicationRepository;

/**
 * @Route("/student", methods={"GET"})
*/
class ResumePageController extends AbstractController
{
    /**
     * @Route("/", name="student_index")
     */
    public function index(ApplicationRepository $applicationRepository): Response
    {
    	$tempid = $this->getUser()->getStudent()->getApplication()->getId();
    	$application = $applicationRepository->findBy([
    		'id' => $tempid
    	]);
        return $this->render('student/index.html.twig', [
            'application' => $application
        ]);
    }
}
