<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/firstDB')]

class MyFirstDBController extends AbstractController
{
    #[Route('/accueil', name: 'home')]
    public function index(): Response
    {
        return $this->render('my_first_db/index.html.twig', [
            'controller_name' => 'MyFirstDBController',
        ]);
    }
}
