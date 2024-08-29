<?php
declare (strict_types = 1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Exercice 18: Créez une fonction qui reçoit un array associatif contenant de couples "VilleDepart-VilleDestination" et renvoie un nouvel array trié par ses indexes (les villes de départ)

    function sort_keys(array $array): array{
        $sorted_by_keys = [];
        
        foreach($array as $key => $value){
            if (is_string($key)){
            $sorted_by_keys [] = $key;
            }
        }
        // var_dump($sorted_by_keys);
        sort($sorted_by_keys, SORT_STRING);
        
        // var_dump($sorted_by_keys);
        return $sorted_by_keys;
    }

    // $try = sort_keys(["Paris"=>"Rome","Istenbul" =>"Bruxelles", "Madrid"=>"Berlin"]);
    // var_dump($try);


    // Exercice 19: Créez une fonction qui reçoit un array associatif et renvoie un nouvel array trié par ses valeurs (les villes de destination)

    function sort_values(array $array): array{
        $sorted_by_values =[];
        foreach($array as $value){
            if(is_string($value)){
                $sorted_by_values [] = $value;
            }        
        }
        sort ($sorted_by_values, SORT_STRING);
        return $sorted_by_values;
    }

    // $try = sort_values(["Paris"=>"Rome","Istenbul" =>"Bruxelles", "Madrid"=>"Berlin"]);
    // var_dump($try);

    // Trier array complet 


    function sort_table_keys($array): array{
        ksort ($array,SORT_STRING);
        return $array;
    }

    $try = sort_table_keys(["Paris"=>"Rome","Istenbul" =>"Bruxelles", "Madrid"=>"Berlin"]);
    var_dump($try);

    function sort_table_values($array): array{
        asort ($array,SORT_STRING);
        return $array;
    }

    $try = sort_table_values(["Paris"=>"Rome","Istenbul" =>"Bruxelles", "Madrid"=>"Berlin"]);
    var_dump($try);

    ?>
    
</body>
</html>