<?php

// Obtenir les données du form
$terme = $_POST["termeRecherche"];
// print($terme);

// connecter à la DB et obtenir les films correcpondants

// Pour connecter à la database:
include("../config.php");

        // 1. Obtenir le terme de recherche du formulaire
        $recherche = $_POST["termeRecherche"];
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

// Encoder le tableau en JSON

$tableauJSON = json_encode($arrayJeux);
print($tableauJSON);

?>