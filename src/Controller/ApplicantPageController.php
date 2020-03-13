<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ApplicationRepository;
use App\Entity\Application;

class ApplicantPageController extends AbstractController
{
    /**
     * @Route("/applicant/page", name="applicant_page")
     */
    public function index(ApplicationRepository $applicationRepository)
    {
    	$applications = $applicationRepository->findBy([]);
        return $this->render('applicant_page/index.html.twig', [
            'applications' => $applications,
        ]);
    }



    public function show(Application $application) {
    	//return new Response('Lire '.$url);
    	return $this->render('applicant_page/show.html.twig', [
            'application' => $application
        ]);
    }
}
