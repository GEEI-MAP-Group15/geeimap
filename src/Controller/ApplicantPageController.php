<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ApplicantPageController extends AbstractController
{
    /**
     * @Route("/applicant/page", name="applicant_page")
     */
    public function index()
    {
        return $this->render('applicant_page/index.html.twig', [
            'controller_name' => 'ApplicantPageController',
        ]);
    }
}
