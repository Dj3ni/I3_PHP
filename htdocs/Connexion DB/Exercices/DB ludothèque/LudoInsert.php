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
    <header><h1>Ajouter un jeu</h1></header>
    <main>

    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores eveniet vitae vero veniam rerum. Numquam atque fugiat culpa sunt alias laborum, minus temporibus, velit consequatur obcaecati provident, inventore voluptatibus minima!
    Nemo, placeat. Blanditiis amet dolore atque eaque cumque incidunt molestias harum magni, dicta debitis odio soluta, accusantium sit! Accusamus, eaque sequi nemo debitis rem perspiciatis id molestias provident sit maxime?</p>
    <br>
    <h3>Ajouter votre jeu</h3>

    <form action="./Traitements Formulaires/LudoInsertTtt.php" method="post" enctype ="multipart/form-data">
        <fieldset>
        
        <div">
            <div class = "mb-3">
                <label for="titre">Titre du jeu: </label>
                <input id = "titre" type="text" name = "titre" >

                <!-- <input class="form-control is-valid">
                <div class="valid-feedback">
                    Looks good!
                </div> -->
            </div>
            <div class="mb-3">
                <label for="ageMin">Age Minimum: </label>
                <input id = "ageMin" type="number" name = "ageMin" min ="0">
            </div>
        </div>
        
        <div>   
            <div class = "mb-3">
                <label for="joueursMin">Nombre de joueurs minimum: </label>
                <input id ="joueursMin"type="number" name = "joueursMin" min ="0">
            </div>
            <div class ="mb-3">
                <label for="joueursMax">Nombre de joueurs maximum: </label>
                <input id ="joueursMax"type="number" name = "joueursMax" min ="0">
            </div>
        </div>
        <div class = "mb-3">
            <label for="duree">Durée moyenne: </label>
            <input id ="duree"type="number" name = "duree" min ="0">
        </div>
        <div class = "mb-3">
            <label for="descript">Description du jeu: </label>
            <textarea name="descript" id="descript" cols="60" rows="10"></textarea>
        </div>
        <div class = "mb-3">
            <label for="photo">Ajouter une photo du jeu: </label>
            <input id = "photo" type = "file" name = "photo">
        </div>
        <button type = "submit">Ajouter</button>

        </fieldset>
        
    </form>

    </main>

    
</body>
</html>