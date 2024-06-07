<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices PHP</title>
</head>

<body>
    <?php
    print("<br> Exercice 6: Créez un tableau qui contient les valeurs du 1 à 200. Affichez son contenu (boucles)". "<br>");

    $values = [];
    for($count = 1; $count <= 200;$count++){
        $values[] = $count;
    }

    foreach($values as $elem){
        print($elem . " - ");
    }

    print("<br> Exercice 7: Créez une boucle qui multiplie par deux chaque valeur du tableau précédant. Le tableau doit être modifié, ce n'est pas juste un affichage". "<br>");

    $values_dubbled = [];

    foreach ($values as $elem){
        $values_dubbled[] = ($elem * 2);
    }

    foreach($values_dubbled as $elem){
        print($elem . " - ");
    }
    print("<br> Exercice 8: (Web) Créez un tableau contenant les notes de 5 élèves et une boucle qui affiche son contenu. Les notes inférieures à 10 seront affichées en rouge. En plus, la boucle calcule et affiche la moyenne des notes. Faites-le avec for et while.". "<br>");



    ?>
</body>

</html>