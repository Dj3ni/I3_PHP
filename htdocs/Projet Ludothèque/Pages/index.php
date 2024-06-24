<?php
include("../Templates/head.php");
?>
<title>Accueil</title>
</head>
<!-- Header -->
<body>
<?php
include ("../Templates/header.php");
?>
<!-- Main -->
<main>

<h2>Bienvenue</h2>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab porro nihil velit neque, ut nam itaque natus possimus, rem amet commodi similique officia, dicta sint odio sunt. Dolor, consectetur totam.
Officia pariatur laboriosam minus magni, ipsum, dignissimos dicta veritatis quisquam itaque perspiciatis ducimus, soluta velit minima voluptas. Non beatae cupiditate, ut, voluptatum numquam repellendus animi est eveniet totam aliquid quos?
Quasi doloribus cum earum harum et aperiam, repellendus ut quod nostrum sequi ducimus reprehenderit odio ullam odit veniam aliquid soluta commodi sunt aspernatur, tempora voluptatem, porro dolore architecto? Asperiores, totam!
Nostrum doloribus ab iste at impedit ipsa quo sint cumque tempora blanditiis sunt, repudiandae consequuntur tempore soluta quaerat tenetur perferendis odit doloremque eaque deserunt, modi et necessitatibus natus. Corrupti, distinctio.
Iusto debitis illo ad modi corrupti neque ducimus repellendus adipisci sed, asperiores architecto at et sint dolor minus expedita vero perspiciatis? Dolorem excepturi nesciunt tenetur quod qui nemo dolore minima?</p>

<article>
    <h1>Ajouts récents</h1>
    

    <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php
            // 1. Connexion à la DB
            include("../Templates/config.php");
            
            try{
                $cnx = new PDO(DSN,USER_NAME,PASSWORD);
                // var_dump($cnx);
            }
            catch (Exception $e){
                    // Expliquer ce qui se passe
                print("<h3>Oops: Problème de connexion à la DB</h3>");
                    // Afficher un image et un lien pour revenir en arrière.
                print("<img src =''>");
                print("<a href = '../index.php'>Retour à l'accueil</a>");
                // var_dump($e->getMessage());// commenter quand en production, uniquement pour debug ( revient au même qu'un tableau orange)
                die(""); //arrête le script
            }

            // 2. Créer la requête

            $sql = "SELECT * FROM projetjeux ORDER BY id DESC LIMIT 3";

            // 3. Préparer

            $stmt = $cnx->prepare($sql);

            // 4. Exécuter
            $stmt->execute();

            // 5. Rechercher le résultat

            $arrayDerniersJeux = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            // 6. Afficher résultat

            foreach ($arrayDerniersJeux as $jeu){
                echo(
                    "<div class='col'>
                        <div class='card' style='width: 20rem;'>
                            <img src='../uploads/". $jeu['Image']."' class='card-img-top' alt='".$jeu['Nom']."'>
                            <div class='card-body'>
                                <h5 class='card-title'>".$jeu['Nom']."</h5>
                                <p class='card-text'>".$jeu['Description']."</p>
                                <a href='#' class='btn btn-primary'>More</a>            
                            </div>
                        </div>
                    </div>");
            }        
            
        ?>
    </div>
</article>

</main>
<!-- Footer -->
<?php
include("../Templates/footer.php");
?>
</body>
</html>