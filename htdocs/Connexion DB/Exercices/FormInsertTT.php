<?php

var_dump($_POST);
include("config.php");
$cnx = new PDO(DSN,USER_NAME,PASSWORD);



$sql = "INSERT INTO stagiaire (Prenom, Hobby, idInterface3) VALUES ($_POST[Prenom], $_POST[Hobby], (int)$_POST[idInterface3])";

$stmt = $cnx->prepare($sql);

$stmt -> execute();