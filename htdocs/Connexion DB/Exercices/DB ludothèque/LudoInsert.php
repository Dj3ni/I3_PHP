<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoInsert</title>
</head>
<style>
    input, textarea,button{
        margin: 5px 0 5px 0;
    }
</style>
<body>
    <h1>Ajouter un jeu</h1>
    <form action="./Traitements Formulaires/LudoInsertTtt.php" method="post">
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
            <input id = "photo" type = "file">
        </div>
        <button type = "submit">Ajouter</button>

        </fieldset>
        
    </form>

    <nav>
        <a href ="index.php">Home</a>
    </nav>

    
</body>
</html>