<?php

namespace App\Controller;

use App\Form\SearchFilmType;
use App\Repository\FilmRepository;
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
    public function searchFilm(Request $req, FilmRepository $rep): Response
    {
        // 1. Créer le formulaire
        $form = $this->createForm(SearchFilmType::class);

        // 2. Gérer la Request
        $form->handleRequest($req);

        // 3. Chercher dans la DB
        if ($req->isMethod("POST") && $form->isSubmitted() && $form->isValid()){
            // 3.1.Récupérer les données soumises
                $data = $form->getData();
            // 3.2 Injecter le Repository ds la fonction
            // 3.3 Récupérer ses infos
            // $films = $rep->filmEntreDeuxDurees($data);
                $films = $rep->filmParTitre($data);
                // dd($films);
            // dd($rep->findAll());
            // 3.4. Envoyer le résultat dans une nouvelle vue
            return $this->redirectToRoute("search_film_result",["film"=>$films]);           
        }

        return $this->render('form_search_film/search.html.twig', [
            'form' => $form,
        ]);
    }


    #[Route ('/form/search/film/result', name:'search_film_result')]
    public function filmSearchResult(Request $req):Response
    {
        // $films = $req ->get

        return $this->render("form_search_film/display_result.html.twig");
    }

}
