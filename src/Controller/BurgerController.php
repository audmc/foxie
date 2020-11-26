<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BurgerController extends AbstractController
{
    /**
     * @Route("/burger", name="burger")
     */
    public function index(): Response
    {
        return $this->render('burger/index.html.twig', [
            'controller_name' => 'BurgerController',
        ]);
    }

    public function burger(): Response
    {
        return $this->render('burger.html.twig', [
            'controller_name' => 'BurgerController',
        ]);
    }
}
