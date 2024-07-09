<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
include('./Triangle.php');

$sommet1 = [50, 50];
$sommet2 = [150, 50];
$sommet3 = [100, 150];
$couleur = "#FF0000";

$triangle1 = new Triangle($sommet1,$sommet2,$sommet3,$couleur);
$triangle1->displayCoordonates();

$triangle1->dessiner();

// // Créer une image avec GD
// $image = imagecreatetruecolor(300,300);
// // Définir la couleur de fond
// $white = imagecolorallocate($image, 255, 255, 255);
// imagefill($image, 0, 0, $white);

// // Créer le triangle

// $triangle1 = new Triangle();
// $triangle1->array_points = [10, 40, 120, 50, 160, 160];
// $triangle1 ->color = "black";

// // Dessiner le triangle
// $triangle1 ->drawTriangle($image);

// // Afficher dans le navigateur
// header('Content-Type: image/png');
// imagepng($image);

// // Détruire l'image pour libérer la mémoire
// imagedestroy($image);

?>


</body>
</html>