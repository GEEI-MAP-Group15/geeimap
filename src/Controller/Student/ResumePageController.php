<?php

namespace App\Controller\Student;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ResumePageController extends AbstractController
{
    /**
     * @Route("/resume/page", name="resume_page")
     */
    public function index()
    {
        return $this->render('resume_page/index.html.twig', [
            'controller_name' => 'ResumePageController',
        ]);
    }
}
