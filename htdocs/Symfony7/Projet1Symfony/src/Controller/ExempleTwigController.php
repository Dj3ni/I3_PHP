<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/exemple")]
class ExempleTwigController extends AbstractController
{
    #[Route('/twig', name: 'exemple_twig')]
    public function index(): Response
    {
        return $this->render('exemple_twig/index.html.twig', [
            'controller_name' => 'ExempleTwigController',
        ]);
    }

    #[Route('/frites', name: "exemple_frites")]
    public function frites():Response
    {
        $sauce = "ketchup";
        $sel = "oui";
        $vars = [
            "repas"=>"frites",
            "sauce"=>$sauce,
            "sel"=>$sel,
        ];
        return $this->render("exemple_twig/frites.html.twig", $vars);
    }

    #[Route('/person', name: "exemple_person")]
    public function personneShow():Response{
        $person = [
            "name"=>"Jenny",
            "hobby"=>"Boardgames"
        ];
        
        return $this->render("exemple_twig/person.html.twig",["person"=>$person] );
    }

    #[Route("/Tvac{value}", name:"exemple_tvac")]
    public function afficheTvac(int $value):Response{
        $tvac = $value * 1.21;

        return $this->render('exemple_twig/prixTvac.html.twig', [
            "tvac"=>$tvac,
            "value"=>$value,
        ]);
    }
    #[Route("/cities/{lang}", name: "exemple_cities")]

    public function displayCities(string $lang):Response{
        
        if($lang === "FR"){
            $cities = ["Bruxelles", "Lisbonne","Madrid"];
        }
        else if($lang === "NL"){
            $cities = ["Brussel", "Lisboa", "Madrid"];
        }
        else{
            $cities = ["Brussels", "Lisboa", "Madrid"];
        }
        
        return $this->render("exemple_twig/cities.html.twig", [
            "cities"=>$cities,
            "lang"=>$lang,
        ]);
    }

    #[Route("/date/{dateTime}", name: "exemple_date")]

    public function afficherDate(DateTime $dateTime): Response{
        $date = $dateTime->format("d/m/y");
        return $this-> render("exemple_twig/date.html.twig", [
            "date" => $date,
        ]);
    }

    #[Route("/price/{value}")]

    public function calculatePrice(int $value): Response{
        $dubbledPrice = $value * 2;

        return $this->render("exemple_twig/price.html.twig", [
            "dubbledPrice"=>$dubbledPrice,
            "initialPrice" =>$value,
        ]);
    }
}


