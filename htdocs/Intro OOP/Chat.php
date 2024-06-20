<?php
declare(strict_types = 1);

class Chat{
    public string $nom;
    public string $race;
    public string $lienImage;

    function __construct(string $unNom,string $uneRace,string $Image){
        $this->nom = $unNom;
        $this->race = $uneRace;
        $this->lienImage = $Image;
    }

    public function miaule():void{
        print("<br>Miaou!");
    }

    public function affiche(): void{
        echo("Mon chat s'appelle ". $this->nom." et est de la race ". $this->race."." );
        echo("<img src='". $this->lienImage ."'>");
    }

}

// Si dans un autre doc, ne pas oublier le include("chemin d'accès")

// Manière simple de créer l'objet
    // $chat1 = new Chat();
    // $chat1 ->nom ="Smoothie";
    // $chat1 ->race = "croisée Main Coon";
    // $chat1 ->affiche();
    // $chat1 ->miaule();

// Utilisation de paramètres

$chat1 = new Chat("Smoothie","Croisée Main Coon",".\img\Smoothie.jpeg");
// $chat1 -> affiche();
$chat1 ->miaule();

// Utilisation d'un constructeur dans la classe

// Utilisation appeler une fonction pour un tableau:

$tableauChats = [$chat1,$chat2, $chat3];

foreach($tableauChats as $chats){
    $chat ->afficher();
}
