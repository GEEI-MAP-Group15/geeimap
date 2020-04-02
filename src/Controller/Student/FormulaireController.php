<?php

namespace App\Controller\Student;

use App\Entity\Student;
use App\Form\StudentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class FormulaireController extends AbstractController
{
    
    public function index()
    {
        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
        ]);
    }

    /**
     * @Route("/student/formulaire", name="formulaire")
     */
	public function fillform(Request $request)
	{
		$student = new Student();
		$form_student = $this->createForm(StudentType::class, $student);
		$form_student->handleRequest($request);

		if($form_student->isSubmitted() && $form_student->isValid())
		{
			
			$student->setUser($this->getUser());

			#$student->setAcademicData();
			#$student->setApplication(1);
			#$student->setBackground(1);
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($student);
			$entityManager->flush();
			return $this->redirectToRoute('homepage');
			#return $this->redirectToRoute("app_question", ['id' => $question->getId()]);
		}

		return $this->render('student/formulaire/index.html.twig', [
			'studentForm' => $form_student->createView()
		]);
	}


}
