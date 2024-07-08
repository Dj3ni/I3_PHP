<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    include("./Jeu.php");

    $jeu1 = new Game("Wyrmspan", 10, 1 ,5, 2024);
    $jeu1 ->setAuthor("Connie Vogelmann");
    print($jeu1->getAuthor());
    var_dump($jeu1);

    $jeu1->setIllustrator("Clémentine Campardou");
    
    // $jeu ->setYearParution(2025);
    // print($jeu->getYearParution());
    // var_dump($jeu);

    // $res = $jeu->setYearParution(2024);
    // var_dump($res);

    // $jeu->setYearParution(2025)->setAuthor("Unknown")->setMinPlayers(3);
    // var_dump($jeu);

    print("<img src='./".$jeu1->getImage()."' alt = ' ". $jeu1->getTitle()."'>");
    print("<br>");

    $jeu1->displayGame();

    ?>
    
</body>
</html>