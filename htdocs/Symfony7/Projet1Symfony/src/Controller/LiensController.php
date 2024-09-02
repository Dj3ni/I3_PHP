<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LiensController extends AbstractController
{
    #[Route('/menu', name: 'app_menu')]
    public function menu(): Response
    {
        return $this->render('liens/menu.html.twig', [
            'controller_name' => 'LiensController',
        ]);
    }
}
