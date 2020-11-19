<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Form\MatiereType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MatiereController extends AbstractController
{
    /**
     * @Route("/matiere", name="matiere")
     */
    public function index(): Response
    {
        return $this->render('matiere/index.html.twig', [
            'controller_name' => 'MatiereController',
        ]);
    }

    public function matiereAll(): Response

    {
        $em = $this->getDoctrine()->getManager();
        $allMatiere = $em->getRepository(Matiere::class)->findAll();
        

        return $this->render('matiere/matiereAll.html.twig', [
            'allMatiere' => $allMatiere,
        ]);
    }

    public function matiereShow($id)
    {
        $em = $this->getDoctrine()->getManager();
        $matiere = $em->getRepository(Matiere::class)->find($id);

        

        return $this->render('matiere/matiereAll.html.twig', [
            'matiere' => $matiere,
        ]);    

    }



    public function create(Request $request){
        $matiere = new Matiere();    
        $form = $this->createForm(MatiereType::class,$matiere);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($matiere);
            $em->flush();

            return $this->redirectToRoute('matiere_create');
        }

        return $this->render('matiere/matiereCreation.html.twig',[
            'form' => $form->createView()
        ]);
    }

    public function delete($id)
    {
        $em = $this->getDoctrine()->getManager();
        $matiere = $em->getRepository(Matiere::class)->find($id);
        $em->remove($matiere);
        $em->flush();

        $this->addFlash('success','La matiere à bien été supprimé');

        return $this->redirectToRoute('matiere_all'); 

    }    





}
