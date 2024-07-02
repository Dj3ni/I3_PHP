<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- feuille css -->
    <link rel="stylesheet" href="./assets/style.css">
    <title>LudoInsert</title>
</head>

<body>
    <?php
        include ("./checkSession.php");
        include("./nav.php");
        

        ?>
    <h1>Ajouter un jeu</h1>
    <form action="./Traitements Formulaires/LudoInsertTtt.php" method="post" enctype ="multipart/form-data">
        <fieldset>
        <legend>Ajouter un jeu</legend>
        <div>
            <label for="titre">Titre du jeu: </label>
            <input id = "titre" type="text" name = "titre">
        </div>
        <div>
            <label for="ageMin">Age Minimum: </label>
            <input id = "ageMin" type="number" name = "ageMin" min ="0">
        </div>
        <div>
            <label for="joueursMin">Nombre de joueurs minimum: </label>
            <input id ="joueursMin"type="number" name = "joueursMin" min ="0">
        </div>
        <div>
            <label for="joueursMax">Nombre de joueurs maximum: </label>
            <input id ="joueursMax"type="number" name = "joueursMax" min ="0">
        <div>
            <label for="duree">Durée moyenne: </label>
            <input id ="duree"type="number" name = "duree" min ="0">
        </div>
        <div>
            <label for="descript">Description du jeu: </label>
            <textarea name="descript" id="descript" cols="60" rows="10"></textarea>
        </div>
        <div>
            <label for="photo">Ajouter une photo du jeu: </label>
            <input id = "photo" type = "file" name = "photo">
        </div>
        <button type = "submit">Ajouter</button>

        </fieldset>
        
    </form>

    
</body>
</html>