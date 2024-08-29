<?php
include("../Templates/head.php");
?>
<title>Add Game</title>
</head>
<!-- Header -->
<body>
<?php
include ("../Templates/header.php");
?>
<!-- Main -->
<main>
<h2>Ajouter un jeu</h2>
<!-- Si formulaire travail avec traitement de formulaire, sinon laisser vide et va rester sur la page -->
    <form action="../Formulaires Traitement/insertGameTtt.php" method="post" enctype ="multipart/form-data">
        <fieldset>        
        <div class="mb-3">

            <label for="titre">Titre du jeu: </label>
            <input id = "titre" type="text" name = "titre" class="form-control">
        </div>
        <div class="mb-3">

            <label for="ageMin">Age Minimum: </label>
            <input id = "ageMin" type="number" name = "ageMin" min ="0" class="form-control">
        </div>
        <div class="mb-3">

            <label for="joueursMin">Nombre de joueurs minimum: </label>
            <input id ="joueursMin"type="number" name = "joueursMin" min ="0" class="form-control">
        </div>
        <div class="mb-3">

            <label for="joueursMax">Nombre de joueurs maximum: </label>
            <input id ="joueursMax"type="number" name = "joueursMax" min ="0" class="form-control">
        </div>
        <div class="mb-3">

            <label for="duree">Durée moyenne: </label>
            <input id ="duree"type="number" name = "duree" min ="0" class="form-control">
        </div>
        <div class="mb-3">

            <label for="descript">Description du jeu: </label>
            <textarea name="descript" id="descript" cols="60" rows="10"class="form-control"></textarea>
        </div>
        <div class="mb-3">

            <label for="photo">Ajouter une photo du jeu: </label>
            <input id = "photo" type = "file" name = "photo" class="form-control">
        </div>
        <button type = "submit">Ajouter</button>

        </fieldset>
        
    </form>






</main>
<!-- Footer -->
<?php
include("../Templates/footer.php");
?>
</body>
</html>