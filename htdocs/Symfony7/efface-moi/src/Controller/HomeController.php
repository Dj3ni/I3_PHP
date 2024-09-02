<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(): Response
    {
        dd("Hello");
        return new Response("Coucou");
        // return $this->render('home/index.html.twig', [
        //     'controller_name' => 'HomeController',
        // ]);
    }
}
