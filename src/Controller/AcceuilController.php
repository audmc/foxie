<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{

    public function Acceuil(): Response
    {
        return $this->render('acceuil.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }
}
