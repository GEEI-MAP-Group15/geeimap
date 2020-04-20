<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Application;
use App\Entity\User;



class ResumePageController extends AbstractController
{
    /**
     * @Route("/resume/page", name="resume_page")
     */
    public function index()
    {

    	//$user= $this->get('security.context')->getToken()->getUser();

        return $this->render('student/resume_page/index.html.twig', [
            'controller_name' => 'ResumePageController',
            //'user' => $user,

        ]);
    }
}
