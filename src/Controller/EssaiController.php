<?php

namespace App\Controller;

use App\Entity\Module;
use App\Entity\Student;
use App\Form\EssaiformType;
use App\Form\Essai1Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class EssaiController extends AbstractController
{
    
    public function index()
    {
        return $this->render('essai/index.html.twig', [
            'controller_name' => 'EssaiController',
        ]);
    }

    /**
     * @Route("/essai", name="essai")
     */
public function fillform(Request $request)
	{
		$essai = new Module();
		$form = $this->createForm(EssaiformType::class, $essai);
		$form->handleRequest($request);

		$essai1 = new Student();
		$form1 = $this->createForm(Essai1Type::class, $essai1);
		$form1->handleRequest($request);

		if($form->isSubmitted() && $form->isValid())
		{
			
			#$essai->addAcademicdata(1);
			
			#$essai->addDegree("1");
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($essai);
			$entityManager->flush();
			#return $this->redirectToRoute("app_question", ['id' => $question->getId()]);
		}

		if ($form1->isSubmitted() && $form1->isValid()) 
		{
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($essai1);
			$entityManager->flush();
				# code...
		}

		return $this->render('essai/index.html.twig', [
					'essaiForm' => $form->createView(),  
					'essaiForm1' => $form1->createView()
		]);

	}

/**public function fillform1(Request $request)
	{
		$essai1 = new Student();
		$form1 = $this->createForm(Essai1Type::class, $essai1);
		$form1->handleRequest($request);

		if ($form1->isSubmitted() && $form1->isValid()) 
		{
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($essai1);
			$entityManager->flush();
				# code...
		}
	

		return $this->render('essai/index.html.twig', [
			'essaiForm1' => $form1->createView()
		]);


	}
**/

}

