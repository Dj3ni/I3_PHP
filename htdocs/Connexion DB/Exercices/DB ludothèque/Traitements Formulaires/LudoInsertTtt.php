<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=t, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<nav>
    <a href="../PagesSite/index.php">Home</a>
    <a href="../PagesSite/LudoInsert.php">Ajouter un jeu</a>
    <a href="../PagesSite/LudoSearch.php">Chercher un jeu</a>          
        
</nav>
    
<?php

include ("../PagesSite/checkSession.php");
    // var_dump($_POST); //pour debug 
    // var_dump($_FILES); //pour debug, vérifier qu'on a bien reçu le fichier

    foreach($_POST as $key => $value){
        echo($key. " : " .$value . "<br>");
    }

    // Pour connecter à la database:
    include("../PagesSite/config.php");

    // Upload du fichier

        // 1.Créer un nom unique pour le fichier:    
        // print(uniqid(). date("h-i-s").$_FILES["photo"]['name']); //ici on concatène une génération id unique avec la date et le nom du fichier
    
        // 2. On met le lien vers le dossier upload dans une variable
        $uploadDir = "../uploads";
        $uploadFile = uniqid().date("h-i-s").$_FILES["photo"]['name'];
        $uploadPath = $uploadDir . "/".$uploadFile;
        // print($uploadPath);//pour debug

        // 3. Déplacer le fichier temporaire et le stocker dans le serveur (from -to )
        
        if (move_uploaded_file($_FILES["photo"]['tmp_name'], $uploadPath)){
            echo "<BR/>Ok! fichier uploaded";
        }
        else {
            echo "<BR/>Erreur upload";	
        }


    // Pour le reste du formulaire

            // 1. Obtenir les données
            $titre = $_POST['titre'];
            $ageMin = $_POST['ageMin'];
            $joueursMin = $_POST['joueursMin'];
            $joueursMax = $_POST['joueursMax'];
            $duree = $_POST['duree'];
            $descript = $_POST['descript'];

            
            // 2. Connecter à la DB
            $cnx = new PDO(DSN,USER_NAME,PASSWORD);
            // var_dump($cnx);

            // 3. Une requête du type Insert

            $sql ="INSERT INTO jeux  (id, NOM, Age, Nbr_joueurs_min,Nbr_joueurs_max,Duree,Description,Image) VALUES (null, :titre, :ageMin, :joueursMin, :joueursMax,:duree,:descript,:image)" ;   //Ici ce sont des placeholder, on ne peut pas mettre de variable dans une requête sql
            
            // 4. Préparer la requête
            $stmt = $cnx->prepare($sql); //Objet PDOStatement

            $stmt ->bindvalue(":titre",$titre);
            $stmt ->bindvalue(":ageMin",(int)$ageMin);
            $stmt ->bindvalue(":joueursMin",(int)$joueursMin);
            $stmt ->bindvalue(":joueursMax",(int)$joueursMax);
            $stmt ->bindvalue(":duree",(int)$duree);
            $stmt ->bindvalue(":descript",$descript);
            $stmt ->bindValue(":image",$uploadFile);


            // 5. Lancer la requête
            $stmt->execute();

            // 6. Vérifier les erreurs
            // var_dump( $stmt->errorInfo());//renvoie un array qui contient des infos sur l'erreur
            /*
            try{
                $cnx = new PDO(DSN,USER_NAME,PASSWORD);
                var_dump($cnx);
            }
            catch (Exception $e){
                    Expliquer ce qui se passe
                print("<h3>Oops: Problème de connexion à la DB</h3>");
                    Afficher un image et un lien pour revenir en arrière.
                print("<img src =''>");
                print("<a href = "../index.php">Retour à l'accueil</a>")
                var_dump($e->getMessage());// commenter quand en production, uniquement pour debug ( revient au même qu'un tableau orange)
                die(""); arrête le script
            }
            */
    ?>
    
</body>
</html>