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

    // Exercice 1: Créez un site contenant un formulaire où l'utilisateur saisira son prénom, nom et âge. Le site doit afficher "Bienvenu XXXX XXXX, vous avez XXXX ans!"

    print("<br>Bonjour ". $_GET["prenom"] . " ". $_GET["nom"]. " Vous avez " . $_GET["age"] . " ans.");

    // Exercice 2: Créez une page (html ou php) contenant un formulaire où on saisit un nom et un prénom. Une autre page (php) traitera les données envoyées et affichera un message de salutation. Si les valeurs rentrées correspondent à votre nom et prénom, le script affichera le message "Que la force soi avec toi." et un lien vers le site officiel de Star Wars

    if ($_GET["prenom"] == "Jenny" and $_GET["nom"] == "Fernandez"){
        print ("<br><a href = 'https://www.starwars.com/'>Que la force soit avec toi!</a>");        
    }
    else{
        print("<br>Bonjour ". $_GET["prenom"] . " ". $_GET["nom"]. "Vous avez " . $_GET["age"] . " ans.");
    }

    ?>
    
</body>
</html>