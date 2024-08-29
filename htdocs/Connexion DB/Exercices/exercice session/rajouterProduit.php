<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rajouter Produit</title>
</head>
<body>
<?php
session_start();

// var_dump($_POST);

// Récupérer le produit choisi
$pick = $_POST["produit"];



print("le produit choisi est: ". $pick);


// Rajouter dans la session


?>    
</body>
</html>