<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    var_dump($_GET);

    // Exercice 3 : Créez un site où l'utilisateur doit deviner un chiffre au hasard entre 0 e 10 (ce chiffre est créé par l'ordinateur en utilisant la fonction mt_rand()). Si la personne gagne, affichez une photo comme prix. Conseil : Apprenez à utiliser la fonction avant d'essayer de créer le site

    $number = mt_rand(0,10);
    
    if ($_GET["attempt"] != $number){
        print("<br> Non, Non, Non, <a href = './exe3.php'>essaie encore!</a>");
        
    }
    else{
        print("<br>Bravo, tu as trouvé!");
        print("<br><br><img src = './images/200.gif' >");
    }




    ?>
    
</body>
</html>
