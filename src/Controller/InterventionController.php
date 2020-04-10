<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InterventionController extends AbstractController
{
    /**
     * @Route("/intervention", name="intervention")
     */
    public function index()
    {
        return $this->render('intervention/index.html.twig', [
            'controller_name' => 'InterventionController',
        ]);
    }

    /**
     * @Route("/intervention/new", name="intervention_new")
     * @Route("/intervention/edit/{id}", name="intervention_edit")
     */
    public function new()
    {
        return $this->render('intervention/new.html.twig', [
            'controller_name' => 'InterventionController',
        ]);
    }

    /**
     * @Route("/intervention/{id}", name="intervention_show")
     */
    public function show()
    {
        return $this->render('intervention/show.html.twig', [
            'controller_name' => 'InterventionController',
        ]);
    }
}
