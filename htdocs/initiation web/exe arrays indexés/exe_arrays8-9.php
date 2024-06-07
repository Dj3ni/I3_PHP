<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices PHP</title>
</head>

<body>
    <?php
    
    print("<br> Exercice 8: (Web) Créez un tableau contenant les notes de 5 élèves et une boucle qui affiche son contenu. Les notes inférieures à 10 seront affichées en rouge. En plus, la boucle calcule et affiche la moyenne des notes. Faites-le avec for et while.". "<br>");
    $notes = [9,15,18,13,4];

    foreach($notes as $elem){
        // print ($elem . " ");# pour debug
        if($elem < 10){
            print("<font color ='red'>".$elem . "</font> \n ");
        }
        else{
            print($elem . " \n");
        }
        // $count = count($notes);
        // while ($count > 0){        
    }
    $moyenne = array_sum($notes)/count($notes);
    print("<br>". "La moyenne des notes est:" .$moyenne);

    print("<br> Exercice 9: Ecrivez un algorithme constituant un tableau, à partir de deux tableaux de même longueur existants. Le nouveau tableau sera la somme des éléments des deux tableaux de départ.". "<br>");

    $tab_1 = [4,8, 7, 9, 1, 5, 4,6];
    $tab_2 = [7,6, 5, 2, 1, 3, 7, 4];
    $tab_result = [];
    
    for($i = 0; $i< count($tab_1); $i++){
        $tab_result [] = ($tab_1[$i] + $tab_2[$i]);           
        }
    
    foreach($tab_result as $elem){
        print($elem . " - ");
    }

    print("<br> Exercice 10: Toujours à partir de deux tableaux existants, écrivez un algorithme qui calcule le schtroumpf des deux tableaux. Pour calculer le schtroumpf, il faut multiplier chaque élément du tableau 1 par chaque élément du tableau 2, et additionner le tout.". "<br>");

    $tab_1 = [3,6];
    $tab_2 = [4,8,7,12];
    $tab_mult = [];
    $tab_result = [];
    $j = 0;

    for($i = 0, $j = 0; $i< count($tab_1); $i++, $j++){
        $tab_result [] = ($tab_1[$i] * $tab_2[$j]);
    }

    print_r($tab_result);
    
    // $tab_result = array_sum($tab_mult);
    // print($tab_result);




    ?>
</body>

</html>