<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include("./Eleve.php");
    // $e = new Eleve();

    // $e->prenom = "Jenny";
    // $e->nom = "Fernandez Garcia";
    // $e->anneeInscription = 2024;
    // $e->dateNaissance = new DateTime("04/28/1989");
    var_dump($e);

    $e1 = new Eleve("Fernandez Garcia", "Jenny", 2024, new DateTime("04/28/2024"));
    
    print($e1->dateNaissance->format("d-m-y h:i:s"));

    // print($e1->getDateNaissance()->format("d-m-y h:i:s"));

?>
</body>
</html>