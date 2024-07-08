<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("./Chien.php");
    include_once("./Chat.php");


    $a1 = new Animal("Bill", "Cocker");
    $a1->affiche();

    $c1 = new Chat("Felix", "Européen");

    ?>
    
</body>
</html>