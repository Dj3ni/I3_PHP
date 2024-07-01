<?php
include("../Templates/head.php");
?>
<title>Résultat Search</title>
</head>
<!-- Header -->
<body>
<?php
include ("../Templates/header.php");
?>
<!-- Main -->
<main>
    <h2>Résultat de la recherche</h2>

<?php
// var_dump($_POST);

    // 1. Obtenir le terme de recherche du formulaire
    $search = $_POST["termeRecherche"];
    // var_dump($search);

    // 2. Connecter à la DB
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
        var_dump($e->getMessage());// commenter quand en production, uniquement pour debug ( revient au même qu'un tableau orange)
        die("");// arrête le script
    } 

    // 3. Une requête de recherche par fragments (on ne peut pas se permettre de faire une recherche en termes exacts!)
    
    // PC maison
    // $sql = "SELECT * FROM projetjeux WHERE Nom LIKE '%".$search."%'";

    // Pc école
    $sql = "SELECT * FROM jeux WHERE Nom LIKE '%".$search."%'";

    
    // 4. Préparer la requête 
    $stmt = $cnx->prepare($sql);

    // et donner des valeurs aux paramètres ( entre % sinon recherche en termes exacts)
    // $stmt ->bindValue(":termeRecherche",("%".$search."%"), PDO::PARAM_STR);

    // 5. Lancer la requête
    $stmt->execute();

    // 6. Obtenir les données
    $arrayResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($arrayResult);  

    // 7. Les afficher sur le site

    print("<ul>");

    foreach ($arrayResult as $results){
        foreach ($results as $key => $value){
            print("<li>".$key ." : ". $value. "</li>");
            
        }
        print("<hr>");
    }
    print("</ul>");


?>






</main>
<!-- Footer -->
<?php
include("../Templates/footer.php");
?>
</body>
</html>