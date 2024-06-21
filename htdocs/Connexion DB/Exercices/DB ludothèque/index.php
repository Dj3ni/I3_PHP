<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exe ludo</title>
</head>
<body>
    <header>
    <h1>Bienvenue</h1>
    </header>
    <main>
        <nav>
            <a href="LudoInsert.php">Ajouter un jeu</a>
            <a href="LudoSearch.php">Chercher un jeu</a>            
        </nav>

        <h3>Les 5 derniers jeux insérés</h3>
        <?php
        
        // 1. Connecter à la DB
        include("config.php");
        try{
            $cnx = new PDO(DSN,USER_NAME,PASSWORD);
            var_dump($cnx);
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
        $array_jeux = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 6. Afficher les données de manière choisie
        var_dump($array_jeux);
        print("<ul>");
        foreach ($array_jeux as $jeu){
            echo("<li><a href=''>".$jeu['Nom']."</a></li>");
        }        
        print("</ul>");
        
        ?>



    </main>
    
    
</body>
</html>