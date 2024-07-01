<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exe ludo</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- feuille css -->
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <?php
        // démarrer la session
        include ("checkSession.php");
        include("nav.php");

        ?>
    <header>
    <h1>Bienvenue
        <?php
        print($_SESSION["nomUtilisateur"]);
        ?>
    </h1>
    </header>
    <main>
        <h3>Les 5 derniers jeux insérés</h3>
        <?php
        
        // 1. Connecter à la DB
        include("config.php");
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
            var_dump($e->getMessage());// commenter quand en production, uniquement pour debug ( revient au même qu'un tableau orange)
            die(""); //arrête le script
        }
        
        // 2. Créer la requête ( afficher les 5 derniers)
        $sql = "SELECT * FROM jeux ORDER BY id DESC LIMIT 5";
        // 3. Préparer la requête£
        $stmt = $cnx->prepare($sql);
        // 4. Lancer la requête
        $stmt ->execute();
        // 5. Obtenir le résultat et le mettre dans un array ( ici liste de jeux)
        $arrayDerniersJeux = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 6. Afficher les données de manière choisie
        // var_dump($array_jeux);
        foreach ($arrayDerniersJeux as $jeu){
            echo(
                "<div class='col'>
                    <div class='card' style='width: 20rem;'>
                        <img src='./uploads/". $jeu['Image']."' class='card-img-top' alt='".$jeu['Nom']."'>
                        <div class='card-body'>
                            <h5 class='card-title'>".$jeu['Nom']."</h5>
                            
                            <a href='./' class='btn btn-primary'>Plus d'infos</a>            
                        </div>
                    </div>
                </div>");
        } 
        // <p class='card-text'>".$jeu['Description']."</p>
        
        ?>



    </main>
    
    
</body>
</html>