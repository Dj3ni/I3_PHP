<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple Orienté Objet</title>
</head>
<body>
    <?php
    print("hello");

    // En programmation classique on fait comme ceci. Ce n'est pas pratique quand il y a de la répétition

    $stagiaire1 = [
        "prenom" =>"Mariam",
        "hobby" => "lire"
    ];
    $stagiaire2 = [
        "prenom" =>"Marwa",
        "hobby" => "danser"
    ];

    function affichePersonne(array $personne,): void{
        echo("<h4>Je m'appelle " . $personne["prenom"] . " et j'aime ". $personne["hobby"]."</h4>");
    };

    affichePersonne($stagiaire1);
    affichePersonne($stagiaire2);

    // Même exercice avec Orienté objet

    // 1. Importer le code qui est dans un autre fichier afin de le rendre accessible
    include("./personne.php");

    // 2. On crée une personne en faisant appel à la classe: on stocke la création dans une variable

    $personne1 = new Personne();

    // 3. Une fois l'objet créé, on a accès aux méthodes et paramètres de la classe via la "->"
    $personne1 ->prenom = "Juana";
    $personne1 ->hobby = "nager";
    $personne1 ->affiche();

    $personne2 = new Personne();
    $personne2 ->prenom = "Margaret";
    $personne2 ->hobby = "faire de la musique";
    $personne2 ->chanter();

    var_dump($personne1);
    var_dump($personne2);





    ?>
</body>
</html>
