<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExampleRoutingController extends AbstractController {

    #Attribut de PHP (aide l'interprète pour retrouver des infos à utiliser ailleur) Il s'écrit: #[Route(chemin pour accéder à l'info, en général nom du fichier)]
    // Route simple, sans paramètres
    #[Route('/exemple/routing/accueil' , name :"accueil")]
    public function afficherMessageAccueil():Response{
        return new Response("Hello, world!");
    }

    // Exercice 1
    #[Route('/exemple/routing/date', name: "date")]
    public function afficherMessageDate():Response{
        return new Response("Date du jour");
    }

    // Exemple route avec paramètres (attention, ils sont obligatoires!)
    #[Route('/exemple/routing/afficher/contact/{nom}/{profession}', name:"profession")]
    public function afficherContact(Request $request):Response{
        $nom = $request->get("nom");
        $profession = $request->get("profession");
        return new Response("Bienvenue, ".$nom.", ".$profession);
    }


} 