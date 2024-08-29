<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exe ludo</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT7tE3GMkaNQy5+b6MY2Bt6SOvPo+yD2RV/FAQTuwAI8IMpH87" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-0tWjI6LOa6KbiTFF3mnkS3Y9oh3v4UluYF15EvL+Rl8hxu0BOvFAY3Zx5LsbEOyP" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"></script>

    <!-- Slick pour caroussel -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
				
    <!-- feuille css -->
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <?php
        // démarrer la session
        include("./nav.php");
        // include("./checkSession.php");
        
        ?>
    <header>
    <h1>Bienvenue
        <?php
        print($_SESSION["nomUtilisateur"]);
        ?>
    </h1>
    </header>
    <main>
        <h3>About</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, blanditiis expedita repellendus consectetur consequuntur, alias deleniti excepturi iure rem amet inventore aut minus similique qui dignissimos explicabo ipsa quam assumenda.
        Velit nisi minima vitae sunt nulla expedita assumenda perspiciatis dolores. Amet corporis illum ipsam architecto illo vel, nulla ut dolor saepe fugit delectus provident obcaecati a iure, eum magni doloribus?
        Dolor commodi modi in, nostrum odit quae aspernatur pariatur ad fuga architecto voluptatem aliquam sunt explicabo molestias earum aperiam ea illo veritatis, beatae quaerat at. Pariatur temporibus eos architecto qui.
        Autem porro a ut quos tenetur rem, in quas. Minus in sequi similique, aperiam nostrum dignissimos beatae sit rerum cumque iure facere tempora accusamus veniam nobis asperiores excepturi ex. Laboriosam!
        Tempore totam fugit eligendi nemo fugiat neque illo, ratione aut laborum perspiciatis id, expedita similique eius hic nam at voluptates cumque placeat omnis, impedit asperiores quos numquam! Alias, ullam laudantium?</p>
        <h3>Les 5 derniers jeux insérés</h3>
        <?php
        
        // 1. Connecter à la DB
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
        
        // 2. Créer la requête ( afficher les 5 derniers)
        $sql = "SELECT * FROM jeux ORDER BY id DESC LIMIT 5";
        // 3. Préparer la requête
        $stmt = $cnx->prepare($sql);
        // 4. Lancer la requête
        $stmt ->execute();
        // 5. Obtenir le résultat et le mettre dans un array ( ici liste de jeux)
        $arrayDerniersJeux = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 6. Afficher les données de manière choisie
        // var_dump($array_jeux);

            // echo("<article class ='cardArticle'>");
            // foreach ($arrayDerniersJeux as $jeu){
            //     // Afficher dans une carte:
            //     echo("<div class = 'cardDiv'>
            //             <div class='card' style='width: 20rem;'>
            //                 <img src='./uploads/". $jeu['Image']."' class='card-img-top' alt='".$jeu['Nom']."'>
            //                 <div class='card-body'>
            //                     <h5 class='card-title'>".$jeu['Nom']."</h5>
                                
            //                     <a href='ficheJeu.php?idJeu=".$jeu['id']."' class='btn btn-primary'>Plus d'infos</a>            
            //                 </div>
            //             </div>
            //         </div>");
            // }
            // echo("</article>");

            
            
            // afficher dans caroussel
            
            echo("<div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
                <ol class='carousel-indicators'>");
        
        for ($i = 0; $i < count($arrayDerniersJeux); $i++) {
            $activeClass = $i === 0 ? 'class="active"' : '';
            echo("<li data-target='#carouselExampleIndicators' data-slide-to='$i' $activeClass></li>");
        }           
        echo("</ol>
            <div class='carousel-inner'>");
        
        $firstItem = true;
        foreach($arrayDerniersJeux as $jeu) {
            $activeClass = $firstItem ? 'active' : '';
            echo("<div class='carousel-item $activeClass'>
                    <img src='./uploads/".$jeu['Image']."' class='d-block w-100
                    ' alt='".$jeu['Nom']."'>
                    <div class='carousel-caption d-none d-md-block'>
                        <h5>".$jeu['Nom']."</h5>    
                        <a href='ficheJeu.php?idJeu=".$jeu['id']."' class='btn btn-primary'>Plus d'infos</a> 
                    </div>
                </div>");
            $firstItem = false;
        }
        
        echo("</div>
            <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                <span class='sr-only'>Previous</span>
            </a>
            <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                <span class='sr-only'>Next</span>
            </a>
        </div>");
    
        
        ?>



    </main>
    
    
</body>
</html>