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
    function addition(float $n1,float $n2): float{
        return ($n1 +$n2);
    }

    print(addition (3,5));

    // Echange de valuers de variables dans une fonction
    $nom1 = "Jenny";
    $nom2 = "Emilie";

    function exchange_values($a,$b):void{
        $c = $a;
        $a = $b;
        $b = $c;    
    }

    $change = exchange_values($nom1,$nom2);

// Ne fonctionne pas donc syntaxe spécifique pour modifier des variables:

    function exchange_values_reference(&$a,&$b):void{
        $c = $a;
        $a = $b;
        $b = $c; 
    }

    exchange_values_reference($nom1,$nom2);
    print($nom1 .$nom2);



    ?>
    
</body>
</html>