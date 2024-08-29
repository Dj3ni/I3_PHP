<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    var_dump($_GET); # pour voir si les données sont bien prises dans le formulaire.Variable qui contient le formaulaire (en array associatif)
    print("Bonjour " . $_GET["prenom"] . " " .$_GET["nom"]);




    ?>
</body>
</html>