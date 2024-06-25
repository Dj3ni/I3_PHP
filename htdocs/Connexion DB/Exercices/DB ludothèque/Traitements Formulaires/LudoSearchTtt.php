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
    <a href="../index.php">Home</a>
    <a href="../LudoInsert.php">Ajouter un jeu</a>
    <a href="../LudoSearch.php">Chercher un jeu</a>          
        
</nav>

    <?php
    include ("../checkSession.php");

    // var_dump($_POST); //pour debug 

    // Pour connecter à la database:
    include("../config.php");
    
            // 1. Obtenir le terme de recherche du formulaire
            $recherche = $_POST["terme"];
            // var_dump($recherche);

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
                // var_dump($e->getMessage());// commenter quand en production, uniquement pour debug ( revient au même qu'un tableau orange)
                die("");// arrête le script
            }        

            // 3. Une requête de recherche par fragments (on ne peut pas se permettre de faire une recherche en termes exacts!)
            $sql = "SELECT * FROM jeux WHERE Nom LIKE :terme";
            
            // LIKE / % = qui contient..% : peut importe ce qui est avant ou après

            // 4. Préparer la requête 
            $stmt = $cnx->prepare($sql); //Objet PDOStatement

            // et donner des valeurs aux paramètres            
            // (attention pas bindValue sinon ca va faire une recherche en termes exacts)
            $stmt->bindValue(":terme","%".$recherche."%", PDO::PARAM_STR);


            // 5. Lancer la requête
            $stmt->execute();

            // 6. Obtenir les données
            $arrayJeux = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($arrayJeux);

            // 7. Les afficher sur le site
            print("<ul>");
            foreach ($arrayJeux as $jeu){
                echo("<li><a href=''>".$jeu['Nom']."</a></li>");
                echo("<img src ='./uploads/". $jeu['Image']."' alt = 'photo du jeu'>");            }        
            print("</ul>");

            // Form pour noter le film
            
                
    ?>
    
</body>
</html>