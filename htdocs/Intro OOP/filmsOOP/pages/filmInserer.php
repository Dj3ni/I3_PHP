<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php
    // include "./checkSession.php";
    // include "./nav.php";
    ?> 
    <h3>Ajouter un film</h3>
    <form action="../traitement/filmInsererTraitement.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="title">Titre</label>
            <input type="text" id="title" name="title">
        </div>
        <div>
            <label for="duration">Durée</label>
            <input type="number" id="duration" name="duration">
        </div>
        <div>
            <label for="synopsis">Synopsis</label>
            <input type="text" id="synopsis" name="synopsis">
        </div>
        <div>
            <label for="dateParution">Date sortie</label>
            <input type="date" id="dateParution" name="dateParution">
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" id="image" name="image">
        </div>
        <div>
            <input type="submit" value="Envoyer" id="envoyer">
        </div>
    </form>

</body>




</html>