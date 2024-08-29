<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    print("<br><br> Exercice 10:Créer un array 'pistesCD'. Chaque élément de l'array contiendra un nom (ex: 'Billie Jean') et une durée exprimée en secondes (250s.) Affichez le contenu de l'array en utilisant une boucle.
    Créez une nouvelle version qui affiche la durée en minutes et secondes   
    Ex: Billie Jean: 4m. 10s.    
    Vous pouvez garder les mêmes variables et ses valeurs dans l'array.    
    Pour éliminer les décimales, vous pouvez utiliser la fonction 'floor' de PHP. Créez un array 'album' contenant le genre de l'album, l'interprète principal, le prix et l'ensemble de pistes.Pour finir, affichez toutes les infos de l'album dans un tableau HTML
    <br>");

    // 1. Créer un array 'pistesCD'

    $pistes_cd = [
        "Billie Jean" => 250,
        "Thriller" => 300,
        "Black or White" => 200,
    ];

    // 2. Affichez le contenu de l'array en utilisant une boucle.

    foreach ($pistes_cd as $song => $duration){
        print("<br>" . $song ." : " . $duration . "sec");
    }

    // 3. Créez une nouvelle version qui affiche la durée en minutes et secondes.

    $time_format = 0;
    $minutes = 0;
    $seconds = 0;

    








    ?>
    
</body>
</html>