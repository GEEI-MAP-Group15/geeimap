<?php

namespace App\Controller\Admission;

use App\Entity\Module;
use App\Entity\Application;
use App\Entity\Student;
use App\Form\ModuleType;
use App\Form\ApplicationType;
use App\Repository\ModuleRepository;
use App\Repository\ApplicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admission/application")
 */
class ApplicationController extends AbstractController
{
    /**
     * @Route("/", name="application_index", methods={"GET"})
     */
    public function index(ApplicationRepository $applicationRepository): Response
    {
        return $this->render('admission/application/index.html.twig', [
            'applications' => $applicationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="application_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $module = new Module();
        $form = $this->createForm(ModuleType::class, $module);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($module);
            $entityManager->flush();

            return $this->redirectToRoute('module_index');
        }

        return $this->render('admission/application/new.html.twig', [
            'module' => $module,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="application_show", methods={"GET"})
     */
    public function show(Application $application): Response
    {
        return $this->render('admission/application/show.html.twig', [
            'application' => $application,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="application_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Application $application): Response
    {
        $form = $this->createForm(ApplicationType::class, $application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('application_index');
        }

        return $this->render('admission/application/edit.html.twig', [
            'application' => $application,
            'form' => $form->createView(),
        ]);
    }




    /**
     * @Route("/{id}", name="application_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Application $application): Response
    {
        if ($this->isCsrfTokenValid('delete'.$application->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($application);
            $entityManager->flush();
        }

        return $this->redirectToRoute('application_index');
    }
}
