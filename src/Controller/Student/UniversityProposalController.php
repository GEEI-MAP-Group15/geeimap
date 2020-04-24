<?php

namespace App\Controller\Student;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;




class UniversityProposalController extends AbstractController
{
    /**
     * @Route("/university/proposal", name="university_proposal")
     */
    public function index()
    {


        return $this->render('student/university_proposal.html.twig', [
            'controller_name' => 'UniversityProposalController',

        ]);
    }
}

