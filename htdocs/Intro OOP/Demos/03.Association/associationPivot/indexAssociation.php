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
include_once("./Société.php");
include_once("./Contrat.php");

$p = new Personne("George","george@mail.com");
$p2 = new Personne("Lucas","lucas@mail.com");

$s = new Enterprise("Coca Cola compagny",194826789," A street");
$s2 = new Enterprise("Mondelez compagny",194826789," Choco land");


$c1 = new Contract();
$c1->createContract($p,$s);
var_dump($c1);

var_dump($s);
var_dump($p);

?>
    
</body>
</html>