<?php

namespace App\Controller;

use App\Form\SearchFilmType;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormSearchFilmController extends AbstractController
{
    // public ManagerRegistry $doctrine;
    // public function __construct(ManagerRegistry $doctrine)
    // {
    //     $this->doctrine = $doctrine;
    // }

    #[Route('/form/search/film', name: 'app_form_search_film')]
    public function searchFilm(Request $req): Response
    {
        // 1. Créer le formulaire
        $form = $this->createForm(SearchFilmType::class);

        // 2. Gérer la Request
        $form->handleRequest($req);

        // 3. Chercher dans la DB
        if ($form->isSubmitted()){
            dd($form);

        }


        return $this->render('form_search_film/search.html.twig', [
            'form' => $form,
        ]);
    }
}
