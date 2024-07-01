<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=t, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Inscription</title>
</head>
<body>
<nav>
    <a href="../login.php">Login</a>
    <a href="../inscription.php">Inscription</a>
</nav>
    
<?php
include ("../checkSession.php");
include("../config.php");

    // 1. Récupérer les données du formulaire
    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    
        // Hacher le mdp!
        $password = $_POST["password"];
        $passwordHashed = password_hash($password,PASSWORD_DEFAULT, ['cost'=>12]);
            // arguments: 1. variable qui contient le mdp, l'algorythme de hashage, le nombre de passage par la fonction
    
        // uploader l'avatar
        $avatar = $_FILES["avatar"];
            // Créer un nom unique pour le fichier
            $uploadDir = "../uploads";
            $uploadFile = uniqid().$avatar["name"].date("h-i-s");
            $uploadPath = $uploadDir . "/". $uploadFile;
            // Le bouger de tmp

            if(move_uploaded_file($avatar["tmp_name"],$uploadPath)){
                echo("File uploaded");
            }
            else{
                echo("Problem with uploading file, try again");
            }

    // 2. Connecter à la DB

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

    // 3. Créer la requête sql 

    // ->Select pour vérifier si déjà dans la db
    $sql = "SELECT * FROM utilisateur WHERE email = :email";
        
    // préparer la requête
    $stmt = $cnx->prepare($sql);
    $stmt->bindValue(":email",$email);
    // Executer
    $stmt->execute();
    //  Récupérer résultat
    $arrayResultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($arrayResultat)){ // idem que count(array) !== 0
        echo("Cette adresse e-mail est déjà prise");
        echo("<a href='../login.php'></a>");
        die();
    }

    else{
        // -> Insert si pas enregistré

        $sql = "INSERT INTO utilisateur (id, Pseudo, Email, Password, Avatar) VALUES (null, :pseudo, :email, :password, :avatar)";

        // 4. Préparer 

        $stmt = $cnx->prepare($sql);

        $stmt -> bindValue(":pseudo", $pseudo);
        $stmt -> bindValue(":email",$email);
        $stmt -> bindValue(":password", $passwordHashed);
        $stmt -> bindValue(":avatar", $uploadFile);

        // 5. Exécuter
        $stmt->execute(); 
        // 6. Vérifier si inscription correcte

        // 7.Rediriger vers page d'accueil

        header("location: ../index.php");

    }

?>
</body>
</html>
