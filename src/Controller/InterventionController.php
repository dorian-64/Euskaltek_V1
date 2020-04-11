<?php

namespace App\Controller;

use App\Entity\Intervention;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InterventionController extends AbstractController
{
    /**
     * @Route("/intervention", name="intervention")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Intervention::class);

        $intervention = $repo->findAll($repo);

        return $this->render('intervention/index.html.twig', [
            'controller_name' => 'InterventionController',
            'intervention' => $intervention
        ]);
    }

    

    /**
     * @Route("/intervention/new", name="intervention_new")
     * @Route("/intervention/edit/{id}", name="intervention_edit")
     */
    public function new(Intervention $intervention = null, Request $request, EntityManagerInterface $em )
    {
        
        if (!$intervention)
        {
            $intervention = new Intervention();
        }

        $form = $this->createFormBuilder($intervention)
                    ->add('date', DateType::class, [
                        'widget'=> 'single_text'
                    ])
                    ->add('status', ChoiceType::class, [
                        'choices'=> [
                            'A Faire' => 'A Faire', 
                            'Fait'    => 'Fait'
                        ]
                    ])
                    ->add('nom')
                    ->add('prenom')
                    ->add('telephone')
                    ->add('observation')
                    ->add('resultat')
                    ->add('technicien', ChoiceType::class, [
                        'choices'=> [
                            'Leaticia' => 'Leaticia',
                            'Michel' => 'Michel',
                            'Julen' => 'Julen',
                            'Joel' => 'Joel',
                        ]
                    ])
                    ->add('date_fin', DateType::class, [
                        'widget'=> 'single_text'
                    ])
                    ->add('materiel', ChoiceType::class, [
                        'choices' =>[
                            'Téléphone portable' => 'Téléphone portable',
                            'Téléphone fixe'     => 'Téléphone portable',
                            'Ordinateur portable'=> 'Ordinateur portable',
                            'Ordinateur fixe'    => 'Ordinateur fixe',
                            'Imprimante'         => 'Imprimante',
                            'Autres'             => 'Autres',
                        ]
                    ])
                    ->add('motdepasse')
                    ->add('cable', ChoiceType::class, [
                        'choices' => [
                            ''    => '', 
                            'Oui' => 'Oui', 
                            'Non' => 'Non'
                        ]
                    ])
                    
                    ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid())
            {
                

                $em->persist($intervention);
                $em->flush();

                return $this->redirectToRoute('intervention');
            };

                    
        
        return $this->render('intervention/new.html.twig', [
            'controller_name' => 'InterventionController',
            'formIntervention' =>$form->createView(),
            'editMode' => $intervention->getId() !== null
        ]);
    }

    /**
     * @Route("/intervention/{id}", name="intervention_show")
     */
    public function show($id)
    {
        $repo = $this->getDoctrine()->getRepository(Intervention::class);

        $intervention = $repo->find($id);

        return $this->render('intervention/show.html.twig', [
            'controller_name' => 'InterventionController',
            'intervention' =>$intervention
        ]);
    }
}
