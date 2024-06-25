<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exe session</title>
</head>
<body>
<form action="./rajouterProduit.php" method="post">
    <select name="produit" id="produit">
        <?php
        // connexion db

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
            // var_dump($e->getMessage());// commenter quand en production, uniquement pour debug ( revient au même qu'un tableau orange)
            die("");// arrête le script
        }

        $sql = "SELECT * FROM article nom";

        $stmt = $cnx->prepare($sql);
        $stmt->execute();
        $arrayArticles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($arrayArticles as $article){
            print("<option value = '". $article['id']."'>".$article["nom"]. "</option>");
        }
        






        ?>
        
    </select>
    <button type ="submit">Accepter</button>


</form>
<?php
// var_dump($arrayArticles);
?>
    
</body>
</html>