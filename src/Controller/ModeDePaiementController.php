<?php

namespace App\Controller;

use App\Entity\ModeDePaiement;
use App\Form\ModeDePaiementType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModeDePaiementController extends AbstractController
{
    /**
     * @Route("/mode/de/paiement", name="mode_de_paiement")
     */
    public function index(): Response
    {
        return $this->render('mode_de_paiement/index.html.twig', [
            'controller_name' => 'ModeDePaiementController',
        ]);
    }

    public function modeDePaiementAll(): Response

    {
        $em = $this->getDoctrine()->getManager();
        $allModeDePaiement = $em->getRepository(ModeDePaiement::class)->findAll();
        

        return $this->render('mode_de_paiement/modeDePaiementAll.html.twig', [
            'allModeDePaiement' => $allModeDePaiement,
        ]);
    }

    public function modeDePaiementShow($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modeDePaiement = $em->getRepository(ModeDePaiement::class)->find($id);

        

        return $this->render('mode_de_paiement/modeDePaiementAll.html.twig', [
            'modeDePaiement' => $modeDePaiement,
        ]);    

    }



    public function create(Request $request){
        $modeDePaiement = new ModeDePaiement();    
        $form = $this->createForm(ModeDePaiementType::class,$modeDePaiement);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($modeDePaiement);
            $em->flush();

            return $this->redirectToRoute('modedepaiement_create');
        }

        return $this->render('mode_de_paiement/modeDePaiementCreation.html.twig',[
            'form' => $form->createView()
        ]);
    }

    public function delete($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modeDePaiement = $em->getRepository(ModeDePaiement::class)->find($id);
        $em->remove($modeDePaiement);
        $em->flush();

        $this->addFlash('success','Le mode de paiement à bien été supprimé');

        return $this->redirectToRoute('modedepaiement_all'); 

    }    


}
