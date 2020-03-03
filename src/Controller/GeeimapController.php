<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class GeeimapController extends AbstractController
{
    public function index()
    {
        //return $this->render('geeimap/index.html.twig', ['controller_name' => 'GeeimapController',        ]);
        return new Response('title');
    }

    public function first_page(){
    	//return new Response('test');
    	return $this->render('geeimap/first_page.html.twig');
    }
}
