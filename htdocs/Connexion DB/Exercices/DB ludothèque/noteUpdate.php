<?php
session_start();
var_dump($_POST);

$idJeu = $_POST["idJeu"];
$valeur = $_POST["Valeur"];
$idUser = $_SESSION["idUser"];
$newNote = $_POST["newNote"];

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
    print("<a href = './index.php'>Retour à l'accueil</a>");
    // var_dump($e->getMessage());// commenter quand en production, uniquement pour debug ( revient au même qu'un tableau orange)
    die("");// arrête le script
}


if($newNote === true){
    $sql = "INSERT INTO note(id, Valeur, idUser, idJeu) VALUES (null, :valeur, :idUser, :idJeu) ";
}

else{
    $sql = "UPDATE note SET Valeur = :valeur WHERE note.idUser = :idUser AND idJeu = :idJeu" ;
}

$stmt = $cnx ->prepare($sql);
$stmt->bindvalue(":idUser",$idUser);
$stmt->bindValue(":idJeu",$idJeu);
$stmt->bindValue(":valeur",$valeur);

$stmt->execute();







