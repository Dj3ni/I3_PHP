<?php
// Créer un lien recherche AJAX dans nav (ajaxSearch.php)
// Créer le fichier .js qui y fait appel ce code doit envoyer les données du formulaire de recherche
// Créer une page de ttt qui nous renvoie le résultat de la recherche
// Encoder le résultat en JSON
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Search</title>
    <script src="./Traitements Formulaires/ajaxSearch.js" defer></script>
</head>
<body>
    <?php
    include("nav.php");
    ?>
    <form action="" method="post" id = "formHTML">
    <input type="text" id ="termeRecherche" name = "termeRecherche">
    <button id = "btnSearch">Rechercher</button>
    </form>
    
</body>
</html>