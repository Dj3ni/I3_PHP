<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    // Route générée automatiquement p  r la commande du terminal
    // #[Route('/home', name: 'app_home')]
    // public function index(): Response
    // {
    //     return $this->render('home/index.html.twig', [
    //         'controller_name' => 'HomeController',
    //     ]);
    // }

    public function index():Response{
        return new Response("Hello, World!");
    }
}
