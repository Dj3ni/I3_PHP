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

    // 1.

    print("<br> Exercice 1: Créez une fonction qui nous dise bonjour <br> ");

    function say_hello() : void { # void: la fonction ne doit rien renvoyer!
        print("<br>Hello!");
    }
    say_hello();

    // 2.

    print("<br><br> Exercice 2: Créez une fonction qui calcule et affiche la somme de deux valeurs <br> ");

    function sum_values(int $n1 , int $n2) : int {
        return $n1 + $n2;
    }

    print("<br>La somme est : ".sum_values(5,8));

    // 3.

    print("<br><br> Exercice 3: Créez une fonction qui affiche la table de multiplication d'une valeur envoyée en paramètre <br> ");

    function multiplication_table(int $n) : void{        
        for($count = 1 ; $count<= 10 ; $count ++){
            print( "<br>".$count ." x " . $n . " = " . ($count * $n));
        }
    }

    multiplication_table(7);

    // Autre version de la fonction : permet de changer la quantité d'itération.

    function multiplication_table2(int $n,int $limite = null ) : void{        
        if ($limite = null){
            $limite == 10;
        }
        for($count = 1 ; $count<= $limite ; $count ++){
            print( "<br>".$count ." x " . $n . " = " . ($count * $n));
        }
    }

    // 4.

    print("<br><br> Exercice 4: Créez une fonction qui reçoit une chaine de caractères et l'affiche en bleu dans un titre principal (H1) <br> ");

    function set_title (string $a): void{
        print("<h1><font color ='red'>$a</font></h1>");
    }

    set_title("Le petit Chaperon Rouge");

    // 5.

    print("<br><br> Exercice 5: Créez une fonction qui reçoit un texte et l'affiche dans un titre principal dans une couleur choisie <br> ");

    function set_title_colour (string $a, string $color): void{
        print("<h1><font color ='$color'>$a</font></h1>");
    }

    set_title_colour("Salut la compagnie", "green");

    // 6.

    print("<br><br> Exercice 6: Créez une fonction qui reçoit un array et affiche ses éléments <br> ");

    function display_array(array $array) : void{
        foreach ($array as $key => $value){
            print("<br>" . $key . " : ". $value);
        }
    }

    $personne1 = ["prénom" => "Mélusine", "hobby" => "natation", "nationalité"=> "belge"];

    display_array($personne1);

    // 7.

    print("<br><br> Exercice 7: Créez une fonction qui reçoit un prix en paramètre et affiche le prix TVAc <br> ");

    function print_tvac(int | float $n): void{
        $tvac = $n * 1.21;
        print("<br>".$tvac." euros TVAC");
    }

    print_tvac(5);

    // 8.

    print("<br><br> Exercice 8: Créez une nouvelle version de la fonction précédente pour qu'elle renvoie la valeur TVAc calculée (cette fonction n'affiche rien). <br> ");

    function price_tvac( int | float $n): float{
        $tvac = $n * 1.21;
        return $tvac;
    }

    print("<br>".price_tvac(5). "euros TVAC");

    // 9. 

    print("<br><br> Exercice 9: Nous voulons créer un jeu de lotto. Développez une fonction valeursLotto() qui affiche 6 valeurs entières aléatoires (utilisez la fonction déjà existante mt_rand) <br> ");

    function valeurs_lotto(int $quantity_numbers):void{
        
        print("<br>");
        
        for ($count = 0; $count < $quantity_numbers ; $count ++){
            $pick = mt_rand(1,40);
            print($pick ." - ");                
        }                
    }

    valeurs_lotto(6);

    // 9. bis. Autre version de l'exercice: je veux pouvoir réutiliser les valeur du tirage:

    function valeurs_lotto_array(int $quantity_numbers): array{
        
        print("<br>");
        $tirage = [];
        for ($count = 0; $count < $quantity_numbers ; $count ++){
            $pick = mt_rand(1,40);            
            $tirage [] = $pick;            
        }
        return $tirage;
    }

    // 9 tris.

    print("<br><br> Exercice 9 tris: Nous avons un array contenant de prix. Utilisez la fonction qui calcule la TVA pour afficher tous ces prix avec la TVA <br> ");

    $price_list = [3.50,4.25,6,7,75];
    foreach($price_list as $price){
        print_tvac($price);
    }
    
    // 10.

    print("<br><br> Exercice 10: Nous avons un panier dans un tableau sous la forme **produits=>prix **: Calculer le total du panier avec une fonction<br> ");

    $price_list = [
        "pomme"=> 0.50,
        "poire"=> 0.75,
        "pèche" => 1.25,
    ];

    function total_basket_price(array $array): float{
        $total = 0;
        foreach ($array as $value){
            $total += $value;
        }
        return $total;
    }

    print(total_basket_price($price_list));





























    ?>
    
</body>
</html>