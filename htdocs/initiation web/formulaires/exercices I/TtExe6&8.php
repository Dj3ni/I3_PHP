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
    var_dump($_POST);

    $price_htva = (int) $_POST["price"];

    $tva = (float) $_POST["tva"];

    $price_tvac = $price_htva + ($price_htva* $tva);

    echo ("\n Le prix TVAC est de : ". $price_tvac . " euros");
    
    ?>
</body>
</html>