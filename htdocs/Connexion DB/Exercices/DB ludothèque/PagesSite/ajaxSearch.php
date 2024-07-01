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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <?php
    include("./checkSession.php");
    include("nav.php");
    ?>
    <form id = "formHTML">
    <input type="text" id ="termeRecherche" name = "termeRecherche">
    <button id = "btnSearch">Rechercher</button>
    </form>

    <div id="divJeux">
        Ici on affichera le résultat de la recherche
    </div>
    
</body>
</html>