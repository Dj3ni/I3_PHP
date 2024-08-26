<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include("./Recipe.php");

$recipe1 = new Recipe("Crêpe");

$recipe1->setIngredients(["4 oeufs","250g de farine", "50g de beurre fondu", "1 pincée de sel", "1/2 litre de lait"]);

print($recipe1->getIngredients()[0]);
print("<br>");
print($recipe1->getIngredients()[4]);
$recipe1->displayIngredients();

$recipe1->setDescription("
1. Mettez la farine dans un saladier avec le sel et le sucre.
2.Faites un puits au milieu et versez-y les œufs.
3.Commencez à mélanger doucement. Quand le mélange devient épais, ajoutez le lait froid petit à petit.
4.Quand tout le lait est mélangé, la pâte doit être assez fluide. Si elle vous paraît trop épaisse, rajoutez un peu de lait. Ajoutez ensuite le beurre fondu refroidi, mélangez bien.
5.Faites cuire les crêpes dans une poêle chaude (par précaution légèrement huilée si votre poêle à crêpes n'est pas anti-adhésive). Versez une petite louche de pâte dans la poêle, faites un mouvement de rotation pour répartir la pâte sur toute la surface. Posez sur le feu et quand le tour de la crêpe se colore en roux clair, il est temps de la retourner.
6.Laissez cuire environ une minute de ce côté et la crêpe est prête.
");
$recipe1->setDuration(25);
$recipe1->displayRecipe();



?>
    
</body>
</html>