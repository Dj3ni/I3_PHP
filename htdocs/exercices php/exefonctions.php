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
    // Exercice 10: Nous avons un panier dans un tableau sous la forme **produits=>prix **

    $fruits_prices = [
        "Poire" => 0.95,
        "Pomme" => 0.5,
        "Mangue" => 2.5,
        "Pèche" => 1.75,
        "Perlinpinpin" => 350,
    ];

    // Exercice 11: Calculer le total du panier avec une fonction.

    $total_price = 0 ;

    foreach($fruits_prices as $fruit){
        $total_price += $fruit;
    }

    print("<br>Prix total du Panier: $total_price euros<br>");

    // Exercice 12 : Créez un array de prix de vols. Créez une fonction qui reçoit un array et crée un tableau HTML contenant tous les prix. Les prix qui dépassent 300 euros seront affichés en rouge

    function display_array_html(array $array): void{
        // Création du head
        print ("<table>");
        print ("<br><caption>Les fruits</caption>"); # titre du tableau
        print("<thead>");
        print ("<tr>");

        foreach ($array as $keys => $values){
            print ("<th>$keys</th>");
        }

        print ("</tr>");
        print("</thead>");

        // Remplissage du tableau

        print ("<tr>");
        foreach ($array as $values){          
                // Si les prix > 300 euros, affiché en rouge
            if ($values >= 300 ){
                print("<td><font color = 'red'>". $values . "</font> euros </td>");
            }
            else{
                print("<td>". $values . " euros</td>");
            }                      
        }
        print ("</tr>");

        print ("</table>");

        // Style
        
        // print("<style>");
        //     table {
        //         border color : solid black;
        //     }
        // print("</style>");

    }
    
    display_array_html($fruits_prices);


    // Exercice 13: Créez une fonction qui génère un array contenant un nombre aléatoire de prix (max 20) dont la valeur est aussi aléatoire (entre 100 et 800 euros)

    function create_prices_list(int $nbr_values): array|null{ 

            // Condition d'exécution fonction
        if ($nbr_values > 20){
            print("<br>Maximum 20 valeurs!<br>");
        }
        else{
            // création array
            $array = [];

            for ($i = 0 ; $i < $nbr_values; $i++ ){
                $price = mt_rand (100,800);
                $array [] = $price;
            }
        }
        return $array;
    }

    $test = create_prices_list(6);
    // foreach ($test as $value){
    //     print("<br>$value");
    // }

    // Exercice 14: Créer une fonction qui génére un tableau de chiffres aléatoires entre 0 et 100 et le renvoie

        // générer un chiffre aléatoire
    function rand_numbers():int{
        $n = mt_rand(0,100);
        return $n;
    }

    // print(rand_numbers()); # pour debug

    function create_table (int $nbr_values): array{
        $array = [];
        for ($i = 0; $i < $nbr_values; $i++){
            $n = mt_rand(0,100);
            $array [] = $n;
        } 
        return $array;
    }

    $test2 = create_table(8);
    
    foreach ($test2 as $value){
        print("<br>$value");
    }

    // Exercice 16 : Créez une fonction qui reçoit un array de noms et renvoie un nouvel array contenant tous les noms en majuscule (paramètre par valeur). Affichez ce nouvel array dans le script principal

    /**
    //  * cette fonctionne sert à faire ceci ou cela
    //  * 
    //  * @param array[string] $arraystring
    //  * @param string $gig
    //  * @return array 
    //  */
    function transform_capital(array $arraystring): array|null{
        $array_capital = [];
        foreach ($arraystring as $name){

            if (is_string($name)){
                $capital_name = mb_strtoupper($name);
                $array_capital [] = $capital_name;
            }
            else{
                print("<br>Il faut un tableau composé uniquement de strings !");
            }
            
        }
        return $array_capital;
    }

    // $test = transform_capital(["hello"," bonjour","ola"]);
    // var_dump($test);
    $test = transform_capital([1,"hello"]);
    var_dump($test);


    ?>   
</body>
</html>