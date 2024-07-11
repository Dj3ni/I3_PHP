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
    include_once("./Animal.php");
    


    // $a1 = new Animal("Bill", "Cocker");
    // $a1->affiche();

    $d1 = new Chien("Bill", "Cocker");
    $c1 = new Chat("Felix", "Européen");
    var_dump($c1);
    $d1->communique();
    $c1->communique();

    function animalCommunique(Animal $x){
        echo("<h2>");
        $x->communique();
        echo("</h2>");
    }

    animalCommunique($d1);

    $animaux = [$c1,$d1];
    foreach($animaux as $animal){
        $animal->communique();
    }

    ?>
    
</body>
</html>