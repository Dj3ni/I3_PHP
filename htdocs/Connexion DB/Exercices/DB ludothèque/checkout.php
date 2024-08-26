<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="./js/cart.js" defer></script>
    
    <!-- feuille css -->
    <link rel="stylesheet" href="./assets/style.css">
    <!--Script JS  -->
    <script src="./js/checkout.js" defer></script>
</head>
<body>   
    <?php
    include("./header.php");
    ?>

<header>
    <h1>Votre panier</h1>
</header>

<?php

// var_dump($_SESSION); //pour debug

if(!in_array("cart", $_SESSION)){
    echo("
    <article>
        <p>Votre panier est vide</p>
        <a href ='./index.php'>Retourner à la page d'accueil</a>
    </article>");
}

else{
        // Connexion à la DB
    include("./config.php");
    try{
        $cnx = new PDO(DSN,USER_NAME,PASSWORD);
        // var_dump($cnx);
    }
    catch (Exception $e){
            // Expliquer ce qui se passe
        print("<h3>Oops: Problème de connexion à la DB</h3>");
            // Afficher un image et un lien pour revenir en arrière.
        print("<img src =''>");
        print("<a href = './index.php'>Retour à l'accueil</a>");
        var_dump($e->getMessage());// commenter quand en production, uniquement pour debug ( revient au même qu'un tableau orange)
        die(""); //arrête le script
    }

    // Création de la requête
            // Je veux récupérer tous les id des jeux ( ils sont les clés de mon panier)
            $ids = array_keys($_SESSION['cart']);
            // var_dump($ids);
            // Je les sépare en différents strings
            $stringIds = implode(",",$ids);
            // print($stringIds);

    $sql = "SELECT * FROM jeux WHERE jeux.id IN (". $stringIds .")";

    $stmt = $cnx->prepare($sql);
    $stmt ->execute();

    $tabJeux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($tabJeux);

    // récupérer le panier de la session

    $cart = $_SESSION["cart"];

    print("<div>Vider le panier: 
        <button id = 'btnClearCart'>🚮</button>
        </div><br>");

    foreach ($tabJeux as $jeu){
        echo(
            "<div id= 'cartArticle' class='card mb-3' style='max-width: 540px;'> <div class='row no-gutters'>
            <div class='col-md-4'>
            <img src='./uploads/".$jeu["Image"]."' class='card-img' alt='".$jeu['Nom']."'></div>
                <div class='col-md-8'>
                <div class='card-body'>
                    <h5 class='card-title'><a href='ficheJeu.php?idJeu='".$jeu['id']."'>".$jeu['Nom']."</a></h5>
                    <div>
                        <label>Quantité: </label>
                        <input type ='number' id = 'quantitycart' min='0' value ='".$cart[$jeu["id"]]."' >
                        <button id ='btnCancel'>❌</button>
                    </div>
                </div>
                </div>
                </div>
                
            </div>"  
        );
        
    }
}

?>

</body>
</html>

