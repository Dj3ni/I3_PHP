<?php

namespace App\Controller;

use App\Entity\Exemplaire;
use App\Entity\Film;
use App\Repository\FilmRepository;
use Doctrine\Persistence\ManagerRegistry;
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

    #[Route("/exemples/insert", name: "exemples_insert")]
    public function exempleInsert(ManagerRegistry $doctrine){
        $em = $doctrine->getManager();
        $film = new Film();
        $film->setTitre("The day the Earth stood still");
        $film->setSynopsis("Un Alien arrive sur Terre pour mettre fin au règne destructeur des Humains et sauver la Vie.");
        $film->setDuree("90");

        $em->persist($film);
        $em->flush();

        dd($film);
    }

    #[Route("/exemples/update", name: "exemples_update")]
    public function exempleUpdate(ManagerRegistry $doctrine){

        // First we have to select the object from de DB
        $em = $doctrine->getManager();
        $repository = $em->getRepository(Film::class);
        $film = $repository ->find(2);

        // update
        $film->setDuree("90");
        $em->flush($film);

        dd($film);
    }

    #[Route("/exemples/select/all", name: "exemples_select_all")]
    public function exempleSelectAll(ManagerRegistry $doctrine){

        // Façon standard:
        $em = $doctrine->getManager();
        $repository = $em->getRepository(Film::class);
        $films = $repository ->findAll();
        $films2 = $repository-> findBy(["duree" => 120]);
        $film = $repository->findOneBy(["duree" => 90]);
        dd($films, $films2, $film);
        
        
    }

    #[Route("/exemples/select/all/inject", name: "exemples_select_all_inject")]
    public function exempleSelectAllInjectRepo(FilmRepository $repository){

        // Raccourci: attention il ne fait qu'un select, pas d'update possible (car pas d'entity manager)
        $films = $repository ->findAll();

        dd($films);
    }

    #[Route("/exemples/insert/exemplaire", name: "exemples_insert_exemplaire")]
    public function exempleInsertExemplaire(ManagerRegistry $doctrine){
        // 1. On cherche  le film dans la DB
        $em = $doctrine->getManager();
        $repository = $em->getRepository(Film::class);
        $film = $repository->findOneBy(["duree" => 120]);

        // 2. On crée les exemplaires et donne les propriétés
        $f1 = new Exemplaire ();
        $f1->setEtat("Excellent");
        $f2 = new Exemplaire ();
        $f2->setEtat("Griffé");
        $f3 = new Exemplaire ();
        $f3->setEtat("Perdu");
        
        // 3.On fait la relation entre la classe Film et la classe Exemplaire (attention à se mettre côté 1 pour ajouter au côté "N")
        $film->addExemplaire($f1);
        $film->addExemplaire($f2);
        $film->addExemplaire($f3);

        // En utilisant le cascade Persist, on autorise la MAJ des exemplaires lorsqu'on modifie le film! Cela nous évite de devoir persister chaque exemplaire
        $em->persist($film);
        
        $em->flush();
        dd($f1,$f2,$f3);
    }

    #[Route("/exemples/delete/exemplaire", name: "exemples_delete_exemplaire")]
    public function exempleDeleteExemplaire(ManagerRegistry $doctrine){
        // 1. On cherche  le film dans la DB
        $em = $doctrine->getManager();
        $repository = $em->getRepository(Film::class);
        $film = $repository->findOneBy(["duree" => 120]);

        // 2. On efface le livre
        $em->remove($film);
        $em->flush();
        dd();
    }
}
