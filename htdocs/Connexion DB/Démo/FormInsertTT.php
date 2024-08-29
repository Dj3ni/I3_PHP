<?php

var_dump($_POST);
include("config.php");
$cnx = new PDO(DSN,USER_NAME,PASSWORD);

// 1.J'obtiens les données:
$prenom = $_POST["Prenom"];
$hobby = $_POST["Hobby"];
$idInterface3 = $_POST["idInterface3"];

// Correct:
$sql = "INSERT INTO stagiaire (id, Prenom, Hobby, idInterface3) VALUES (null, '". $prenom. "','".$hobby."','".$idInterface3."')";

// Incorrect: il ne peut pas y avoir de variables dans une requête My sql, on doit utiliser des placeholders
// $sql = "INSERT INTO stagiaire (Prenom, Hobby, idInterface3) VALUES ($_POST[Prenom], $_POST[Hobby], (int)$_POST[idInterface3])";

$stmt = $cnx->prepare($sql);

$stmt -> execute();