<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\Airport;
use App\Form\AirportType;
use App\Form\FilmType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form')]
    public function index(): Response
    {
        return $this->render('form/index.html.twig');
    }

    #[Route('/form/airport', name: 'vue_form')]
    public function displayFormAirport(Request $req, ManagerRegistry $doctrine): Response
    {
        // 1. Créer une entité vide
        $airport = new Airport([]); // le constructeur attend un array, on met donc un array vide ou alors modifier le constructeur pour qu'il soit vide par défaut 

        // 2. On crée le form et associe Entité au Form
        $form = $this->createForm(AirportType::class, $airport);

        // 3. Gérer la request ( Get ou Post?)
        $form->handleRequest($req);
        // dd($req);//Vérifier la méthode

        // 4. Si c'est POST, on visualise le contenu de l'entité
        if ($form->isSubmitted() && $form->isValid()){
            // dd($airport); //une fois le formulaire soumis, affiche les données du formulaire
            $em = $doctrine->getManager();
            $em->persist($airport);
            $em->flush();

            // 5. a. Gérer une redirection,...
            // return $this->render("form/other_vue.html.twig",[
            //     "form"=>$form,
            // ]);
            // // 5. b. Renvoyer vers une autre action
            // return $this->redirectToRoute("name_autre_action", {"param1": $val1,"param2:$val2"});
        }

        // dd($form);
        // Si c'est un GET, il va juste afficher le from:
        return $this->render('form/airport_form.html.twig', [
            "form"=>$form,
        ]);
    }

    #[Route('/form/film', name: 'form_film')]
    public function inputFormFilm(ManagerRegistry $doctrine, Request $req): Response
    {
        // 1. Création entité vide
        $film = new Film([]);
        // 2. Lier
        $form = $this->createForm(FilmType::class, $film);
        // 3. Request
        $form->handleRequest($req);
        // 4. Ajouter dans la DB
        if ($form->isSubmitted()){
            // dd($airport); //une fois le formulaire soumis, affiche les données du formulaire
            $em = $doctrine->getManager();
            $em->persist($film);
            $em->flush();
            dd("insertion livre ok");
        }
        // dd($form);


        return $this->render('form/inputFilm_form.html.twig', [
            "form"=>$form,
        ]);
    }

}
