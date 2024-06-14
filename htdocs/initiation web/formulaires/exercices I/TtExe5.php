<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loto</title>
</head>
<body>

    <?php

var_dump($_POST["chiffre"]);



    // Je génère le code
    
    $CODE_LENGHT = 6;

    $n_gagnant = [];

    for ($i = 0; $i < $CODE_LENGHT; $i ++){
        $pick = mt_rand(0, 41);
        while (in_array($pick, $n_gagnant, true)){
            $pick = mt_rand(0, 41); 
        }
        $n_gagnant[] = $pick;
    }

    var_dump($n_gagnant);

    // Je compare la proposition de l'utilisateur avec le code gagnant

    $essai = $_POST["chiffre"];   
    
    $result = array_intersect($essai, $n_gagnant);
    var_dump($result);

    // Je traite le résultat
    
    if (count($result) == $CODE_LENGHT){
        echo ("<img src = ../../images/winner.jpg>");
    }
    elseif(count($result) == intdiv($CODE_LENGHT, 2)){
        echo ("Vous avez trouvé la moitié!");
    }
    else{
        echo("Perdu!");
    }
    ?>
    
</body>
</html>