<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple Select</title>
</head>
<body>
    <?php
    // 1.Créer un objet de connexion (classe PDO)
    include ("./DB config/config.php");
    
    $cnx = new PDO(DSN,USER_NAME,PASSWORD);//nom donné aux variables pour se connecter à une DB ( autre nom possible aussi: DSN)
    var_dump($cnx);

    // 2.Créer un string contenant la requête SQL
    $sql = "DELETE FROM stagiaire WHERE Prénom = 'Marwa'";

    // 3. Préparer la requête
    $stmt = $cnx->prepare($sql);

    // 4.Lancer la requête sur le serveur MySQL
    $stmt ->execute();    
    
    ?>
</body>
</html> 