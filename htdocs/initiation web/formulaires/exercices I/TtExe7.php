<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src = " ../../images/aristochats.jpg">
    <?php

        var_dump($_POST);
        var_dump($_POST["animal"]);

        echo( "Vous avez choisi l'animal: <br>");

        // aller chercher le chemin pour les images

        echo("<img src = '../../images/" . $_POST["animal"]. " '>");

    ?>
    <br>
    <!-- Lien pour revenir à la page précédente -->
    <a href = "./exe7.php">Retour</a>
    
</body>
</html>