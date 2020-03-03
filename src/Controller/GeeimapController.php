<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GeeimapController extends AbstractController
{
    /**
     * @Route("/geeimap", name="geeimap")
     */
    public function index()
    {
        return $this->render('geeimap/index.html.twig', [
            'controller_name' => 'GeeimapController',
        ]);
    }
}
