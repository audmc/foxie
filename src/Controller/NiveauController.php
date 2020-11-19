<?php

namespace App\Controller;

use App\Entity\Niveau;
use App\Form\NiveauType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class NiveauController extends AbstractController
{
    /**
     * @Route("/niveau", name="niveau")
     */
    public function index(): Response
    {
        return $this->render('niveau/niveau.html.twig', [
            'controller_name' => 'NiveauController',
        ]);
    }

    public function niveauAll(): Response

    {
        $em = $this->getDoctrine()->getManager();
        $allNiveau = $em->getRepository(Niveau::class)->findAll();
        //var_dump($allArticles);

        return $this->render('niveau/niveauAll.html.twig', [
            'allNiveau' => $allNiveau,
        ]);
    }

    public function niveauShow($id)
    {
        $em = $this->getDoctrine()->getManager();
        $niveau = $em->getRepository(Niveau::class)->find($id);

        //var_dump($article);

        return $this->render('niveau/niveauAll.html.twig', [
            'niveau' => $niveau,
        ]);    

    }



    public function create(Request $request){
        $niveau = new Niveau();    
        $form = $this->createForm(NiveauType::class,$niveau);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($niveau);
            $em->flush();

            return $this->redirectToRoute('niveau_create');
        }

        return $this->render('niveau/niveauAll.html.twig',[
            'form' => $form->createView()
        ]);
    }

    public function delete($id)
    {
        $em = $this->getDoctrine()->getManager();
        $niveau = $em->getRepository(Niveau::class)->find($id);
        $em->remove($niveau);
        $em->flush();

        $this->addFlash('success','Le niveau à bien été supprimé');

        return $this->redirectToRoute('niveau_all'); 

    }    
}    