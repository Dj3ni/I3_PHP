<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices PHP</title>
</head>

<body>
    <?php
    $tab = ["Paris", "Bruxelles","Rome", "Maastricht","Madrid"];

    print("<br> Exercice 3: Créez un tableau contenant les noms de 5 villes. Affichez le contenu du tableau en utilisant une boucle" . "<br>");
    foreach($tab as $elem){
        print($elem . "<br>");
    }

    print("<br>Exercice 4: Rajoutez deux villes au tableau précédant et affichez le tableau" . "<br>");
    $tab = [...$tab,"Lima","Washington"];
    foreach($tab as $elem){
        print($elem . "<br>");
    }

    print("<br>Exercice 5: Remplacez la première ville du tableau par 'Quito'" . "<br>");
    $tab[0] = "Quito";
    print("Première ville: ".$tab[0]. "<br>");

    ?>
</body>

</html>