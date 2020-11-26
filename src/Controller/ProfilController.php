<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Form\ProfilType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    public function update(Request $request){
        $profil = new Profil();    
        $form = $this->createForm(ProfilType::class,$profil);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($profil);
            $em->flush();

            return $this->redirectToRoute('profil_update');
        }

        return $this->render('profil/update.html.twig',[
            'form' => $form->createView()
        ]);
    }
    public function delete()
    {
        $em = $this->getDoctrine()->getManager();
        $profil = $em->getRepository(Profil::class)->findAll();
        $em->remove($profil);
        $em->flush();

        $this->addFlash('success','Le mode de paiement à bien été supprimé');

        return $this->redirectToRoute('profil_update'); 

    }    

}
