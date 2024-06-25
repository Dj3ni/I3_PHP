<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=t, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
<nav>
    <a href="../index.php">Home</a>
    <a href="../LudoInsert.php">Ajouter un jeu</a>
    <a href="../LudoSearch.php">Chercher un jeu</a>
    <a href="login.php">Login</a>
    <a href="inscription.php">Inscription</a>          
        
</nav>
    
<?php
    
    include("../config.php");

    // démarrer la session
    session_start();

    // 1. Récupérer les données
        $email = $_POST["email"];
        $password = $_POST["password"];

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

    // Vérifier si mail correct
        // 3.  Créer la requête

        $sql = "SELECT * FROM utilisateur WHERE email = :email";
            
        // préparer la requête
        $stmt = $cnx->prepare($sql);
        $stmt->bindValue(":email",$email);
        // Executer
        $stmt->execute();
        //  Récupérer résultat
        $arrayResultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($arrayResultat)){
            // Si utilisateur existe:
        // obtenir le pwd de la DB
        $passwordHachedDB = $arrayResultat[0]["Password"];
            // obtenir le nom de l'utilisateur.
        $nomUtilisateur = $arrayResultat[0]['Pseudo'];
        // var_dump($nomUtilisateur);

            if(password_verify($password, $passwordHachedDB) == false){
                // password pas bon:
                print("Utilisateur ou mot de passe incorrect<br>");
                print("<a href='../login.php'>Se connecter</a>");
                die();
            }
            else{
                    //On écrit le nom de l'utilisateur
                    // dans la session ($_SESSION)
                    // Ne pas oublier de démarrer la session (tout en haut du doc)
                $_SESSION["nomUtilisateur"] = $nomUtilisateur;
                // var_dump($_SESSION);//pour debug
                // die(); //pour debug

                header("location:../index.php"); // redirection vers page d'accueil.
            }
            
        }
            // Si l'utilisateur n'existe pas
        else{
            print("Utilisateur inconnu");
            print("<a href='../inscription.php>S'inscrire</a>");
            print("<a href='../login.php>Se connecter</a>");
        }
        





































































































    

    

?>
</body>
</html>
