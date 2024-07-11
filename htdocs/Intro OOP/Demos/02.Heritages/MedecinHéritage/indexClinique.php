<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include_once("./Personne.php");
include_once("./Medecin.php");
include_once("./Patient.php");

$person1 = new Personne(458,"Maria", "maria@mail.com");
print($person1->getMail());

$person2 = new Medecin(45789623, "Dorothée", "doro@mail.com", 4679871697,"Chirurgienne");
$person2->displayPersonne();
var_dump($person2);

$patient1 = new Patient(4578795, "Mélusine", "mel@mail.com");
$patient1->displayPersonne();
var_dump($patient1);


?>
    
</body>
</html>