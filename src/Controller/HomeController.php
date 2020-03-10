<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/public", name="home")
     */
    public function index()
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}