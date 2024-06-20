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
    $sql = "SELECT Prénom, NOM FROM stagiaire ";

    // 3. Préparer la requête
    $stmt = $cnx->prepare($sql);

    // 4.Lancer la requête sur le serveur MySQL
    $stmt ->execute();

    // 5. Obtenir les données dans un Array
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($resultat);

    // Attention on obtien qu'un seul Array, non un array associatif, on va récupérer que la première ligne du résultat de la requête. Si on continue, il va chercher la ligne suivante.
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($resultat);

    // 6. Afficher les données obtenues
    
// Ex dans une liste avec ul/li
print("<ul>");

// foreach ($resultat as $stagiaire){
//     print("<li>".$stagiaire["Prénom"] . " ".$stagiaire["NOM"]."</li>");
// }   
//     /*ou on refait un foreach pour avoir que les valeurs:
//     foreach($stagiaire as $valeur){
//     print("<li>".$valeur"</li>")
//     }*/

// print("</ul>");
    
    ?>
</body>
</html>