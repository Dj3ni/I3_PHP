<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include("./exeClasses.php");

$image1 = new Image("","../Connexion DB/Exercices/DB ludothèque/uploads/667ac6f35987803-32-352pommes3pains.jpg", "2 pommes 3 pains");
// var_dump($image1);


$liens = ["../img/wyrmspan.jpg", "../img/2-pommes-3-pains.jpg", "../img/6qui prend.jpg"];

foreach($liens as $lien){
    $objetImage = new Image("",$lien,"");
    $objetImage->displayImage();
    // var_dump($objetImage);
    // Ou en une ligne:
    // (new Image ("",$lien))->displayImage();
}



?>
    
</body>
</html>