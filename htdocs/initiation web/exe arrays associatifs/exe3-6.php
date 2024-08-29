<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

print("<br> Exercice 3:Créez un tableau contenant des pays. Pour chaque pays on doit stocker son nom et sa capitale. Créez une boucle foreach pour afficher son contenu dans la forme 'La capital de xxxx est xxxx' <br>");

    $pays1 = ["Nom"=>"Espagne","Capitale"=>"Madrid"];
    $pays2 = ["Nom"=>"Belgique","Capitale"=>"Bruxelles"];
    $pays3 = ["Nom"=>"Nederland","Capitale"=>"Amsterdam"];

    $europe = [$pays1,$pays2,$pays3];

    foreach ($europe as $pays){
        print("<br>La capitale de " .$pays["Nom"]." est " .$pays["Capitale"]);    
    }

    print("<br><br> Exercice 4:Rajoutez deux pays et leur capital après la déclaration mais avant la boucle d'affichage <br>");

    $pays4 = ["Nom"=>"Luxembourg","Capitale"=>"Luxembourg"];
    $pays5 = ["Nom"=>"France","Capitale"=>"Paris"];

    $europe = [...$europe,$pays4,$pays5];

    foreach ($europe as $pays){ 
        print("<br>La capitale de " .$pays["Nom"]." est " .$pays["Capitale"]);    
    }
    print("<br>");
    

    print("<br><br> Exercice 5: Modifiez la boucle pour qu'elle affiche uniquement les pays. Modifiez la boucle pour qu'elle affiche uniquement les capitales. Revenez à la boucle originale <br>");

    print("<br> Les pays : <br>");
    foreach ($europe as $pays){ 
        print("<br>".$pays["Nom"]);    
    }

    print("<br> Les capitales : <br>");
    foreach ($europe as $pays){ 
        print("<br>".$pays["Capitale"]);    
    }

    foreach ($europe as $pays){ 
        print("<br>La capitale de " .$pays["Nom"]." est " .$pays["Capitale"]); 
    }

    print("<br><br> Exercice 6: Affichez le contenu du array avec print_r pour mieux comprendre l'organisation des indices<br>");

    print_r($europe);

    ?>
    
</body>
</html>