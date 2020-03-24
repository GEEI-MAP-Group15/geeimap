<?php

namespace App\Controller\Admission;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admission", name="admission")
 */
class AdmissionController extends AbstractController
{
    /**
     * @Route("/", name="admission_index")
     */
    public function index()
    {
        return $this->render('admission/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
