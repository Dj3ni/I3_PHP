<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Jeu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/img/style.css">
</head>
<body>

<?php
include("./checkSession.php");
include("./nav.php");

// Obtenir les données du formulaire ( ici id du$jeu)
$idJeu = $_GET['idJeu']; // on le récupère de l'adresse url

// Connexion DB
include("./config.php");

try{
    $cnx = new PDO(DSN,USER_NAME,PASSWORD);
    // var_dump($cnx);
}
catch (Exception $e){
        // Expliquer ce qui se passe
    print("<h3>Oops: Problème de connexion à la DB</h3>");
        // Afficher un image et un lien pour revenir en arrière.
    print("<img src =''>");
    print("<a href = '../index.php'>Retour à l'accueil</a>");
    // var_dump($e->getMessage());// commenter quand en production, uniquement pour debug ( revient au même qu'un tableau orange)
    die("");// arrête le script
}  

$sql = "SELECT * FROM jeux WHERE id=:id";

$stmt = $cnx->prepare($sql);
$stmt->bindValue(":id", $idJeu);

$stmt->execute();

$jeu = $stmt->fetch(PDO::FETCH_ASSOC);//Le premier résultat de la requête
// var_dump($jeu);

print("<h1>".$jeu["Nom"]."</h1>");
print("<img src ='./uploads/".$jeu["Image"]."'class = 'affiche'</img>");
print("<p>🎂 A partir de: ".$jeu["Age"]." ans</p>");
print("<p>👯 De ".$jeu["Nbr_joueurs_min"]. " à ".$jeu["Nbr_joueurs_max"]." joueurs</p>");
print("<p>⌚ Durée moyenne: ".$jeu["Duree"]." minutes</p>");
print("<p>Description: <br>".$jeu["Description"]."</p>");




?>
    
</body>
</html>