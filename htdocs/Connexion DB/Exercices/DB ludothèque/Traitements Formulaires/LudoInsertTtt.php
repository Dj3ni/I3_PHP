<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=t, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    var_dump($_POST); //pour debug 

    foreach($_POST as $key => $value){
        echo($key. " : " .$value . "<br>");
    }

    // Pour connecter à la database:
    include("../config.php");

            // 1. Obtenir les données
            $titre = $_POST['titre'];
            $ageMin = $_POST['ageMin'];
            $joueursMin = $_POST['joueursMin'];
            $joueursMax = $_POST['joueursMax'];
            $duree = $_POST['duree'];
            $descript = $_POST['descript'];
            // $photo = $_POST['photo'];

            // 2. Connecter à la DB
            
            $cnx = new PDO(DSN,USER_NAME,PASSWORD);
            var_dump($cnx);

            // 3. Une requête du type Insert

            $sql ="INSERT INTO jeux  (id, NOM, Age, Nbr_joueurs_min,Nbr_joueurs_max,Duree,Description) VALUES (null, :titre, :ageMin, :joueursMin, :joueursMax,:duree,:descript)" ;   //Ici ce sont des placeholder, on ne peut pas mettre de variable dans une requête sql
            
            // (id, NOM, Age, Nbr_joueurs_min,Nbr_joueurs_max, Duree)
            
            // 4. Préparer la requête
            $stmt = $cnx->prepare($sql); //Objet PDOStatement

            $stmt ->bindvalue(":titre",$titre);
            $stmt ->bindvalue(":ageMin",(int)$ageMin);
            $stmt ->bindvalue(":joueursMin",(int)$joueursMin);
            $stmt ->bindvalue(":joueursMax",(int)$joueursMax);
            $stmt ->bindvalue(":duree",(int)$duree);
            $stmt ->bindvalue(":descript",$descript);


            // 5. Lancer la requête
            $stmt->execute();

            // 6. Vérifier les erreurs
            var_dump( $stmt->errorInfo());//renvoie un array qui contient des infos sur l'erreur
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