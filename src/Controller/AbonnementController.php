<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Form\AbonnementType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AbonnementController extends AbstractController
{
    /**
     * @Route("/abonnement", name="abonnement")
     */
    public function index(): Response
    {
        return $this->render('abonnement/index.html.twig', [
            'controller_name' => 'AbonnementController',
        ]);
    }


    public function abonnementAll(): Response

    {
        $em = $this->getDoctrine()->getManager();
        $allAbonnement = $em->getRepository(Abonnement::class)->findAll();
        

        return $this->render('abonnement/abonnementAll.html.twig', [
            'allAbonnement' => $allAbonnement,
        ]);
    }

    public function abonnementShow($id)
    {
        $em = $this->getDoctrine()->getManager();
        $abonnement = $em->getRepository(Abonnement::class)->find($id);

        

        return $this->render('abonnement/abonnementAll.html.twig', [
            'abonnement' => $abonnement,
        ]);    

    }



    public function create(Request $request){
        $abonnement = new Abonnement();    
        $form = $this->createForm(AbonnementType::class,$abonnement);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($abonnement);
            $em->flush();

            return $this->redirectToRoute('abonnement_create');
        }

        return $this->render('abonnement/abonnementCreation.html.twig',[
            'form' => $form->createView()
        ]);
    }

    public function delete($id)
    {
        $em = $this->getDoctrine()->getManager();
        $abonnement = $em->getRepository(Abonnement::class)->find($id);
        $em->remove($abonnement);
        $em->flush();

        $this->addFlash('success','L\'abonnement à bien été supprimé');

        return $this->redirectToRoute('abonnement_all'); 

    }    



}
