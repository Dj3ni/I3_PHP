<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple Dates</title>
</head>
<body>
    <?php

    $date1 = new DateTime();
    var_dump($date1);

    $date2 = new DateTime("8-10-2025");
    var_dump($date2);

    print($date2->format("D-M-Y")."<br>");
    print($date2->format("d-m-Y"));

    

    ?>
    
</body>
</html>