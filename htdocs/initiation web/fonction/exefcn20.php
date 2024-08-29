<?php
declare (strict_types = 1);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //  Exercice 20: Nous voulons générer de noms complets de personnages pour un jeu de vidéo. Créez une fonction capable de générer un array de noms complets à partir d'un array de noms et un autre de prénoms.
// Note: Pour éviter de générer à chaque fois les mêmes couples, utilisez la fonction shuffle, capable de mélanger au hasard les éléments d'un array


$noms = ["Fernandez", "Dupont", "Smet", "Mendoza","Vervenne"];
$prenoms = ["Jean", "Jane","Anaïs","Bertrand", "Axel","Olivia","Louis"];

function create_perso(array $noms, array $prenoms): array{
    $perso_name = [];
    for ($i = 0; $i < count($prenoms);$i++){
        $perso_name [] = $prenoms[$i] . " " . $noms[$i];
    }
    return $perso_name;
}
$res = create_perso($noms,$prenoms);
var_dump($res);

    ?>
    
</body>
</html>