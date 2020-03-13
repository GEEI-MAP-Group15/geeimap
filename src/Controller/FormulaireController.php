<?php

namespace App\Controller;

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
     * @Route("/formulaire", name="formulaire")
     */
	public function fillform(Request $request)
	{
		$student = new Student();
		$form = $this->createForm(StudentType::class, $student);
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid())
		{
			
			$student->setUser($this->getUser());
			$student->setAcademicData(1);
			$student->setApplication(1);
			$student->setBackground(1);
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($student);
			$entityManager->flush();
			#return $this->redirectToRoute("app_question", ['id' => $question->getId()]);
		}

		return $this->render('formulaire/index.html.twig', [
			'studentForm' => $form->createView()
		]);
	}


}
