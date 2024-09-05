<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        var_dump($_POST);
    $bedsizes = [
        "simple" => 50,
        "double" => 95,
        "suite" => 250,
    ];

    $quantity = (int) $_POST["quantity"];
    $choice = $_POST["bedsize"];
    $price = 0;

    foreach ($bedsizes as $key => $value) {
        if ($choice === $key){ 
            $price += ($quantity * $value);            
        }
    }
    var_dump($price);

    echo("Vous avez réservé " .$quantity . " chambre(s) ". $choice . " pour un total de ". $price . " euros.");



    ?>
    
</body>
</html>