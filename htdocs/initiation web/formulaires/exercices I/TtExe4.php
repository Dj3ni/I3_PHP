<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    var_dump($_POST);

    // Exercice 4 : Créez un script contenant un formulaire où on saisit deux valeurs entières. Un autre script traitera les données envoyées et affichera toutes les valeurs entières qui existent entre les deux dans un tableau HTML

    // Génération des entiers
    $range = range((int)$_POST["valeur1"]+1,(int)$_POST["valeur2"]-1);

    var_dump($range);

    // Affichage du résultat dans un tableau HTML
    
    print("<table>");
    print("<caption>Entiers situés entre ".$_POST["valeur1"]. " et " . $_POST["valeur2"]."</caption>");
    
    print ("<tr>");

    for ($i = 0; $i< count($range); $i++){
        print("<td>".$range[$i]."</td>");
    }
    print("</tr>");
    print("</table>"); 

    // Style

    print("<style>
        table{
        border : 2px solid black;
    };
    </style>");

    ?>

    
</body>
</html>