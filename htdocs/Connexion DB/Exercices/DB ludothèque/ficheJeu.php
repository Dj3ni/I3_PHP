<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Jeu</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- feuille css -->
    <link rel="stylesheet" href="./assets/style.css">
    >
    <!-- Plugin étoiles -->
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
    <!-- Script Notes -->
    <script src="./js/rating.js" defer></script>
    
</head>

<body>

    <?php
    include("./checkSession.php");
    include("./nav.php");

    // var_dump($_SESSION);

    // Obtenir les données du formulaire ( ici id du$jeu)
    $idJeu = $_GET['idJeu']; // on le récupère de l'adresse url

    // Connexion DB
    include("./config.php");

    try {
        $cnx = new PDO(DSN, USER_NAME, PASSWORD);
        // var_dump($cnx);
    } catch (Exception $e) {
        // Expliquer ce qui se passe
        print("<h3>Oops: Problème de connexion à la DB</h3>");
        // Afficher un image et un lien pour revenir en arrière.
        print("<img src =''>");
        print("<a href = './index.php'>Retour à l'accueil</a>");
        // var_dump($e->getMessage());// commenter quand en production, uniquement pour debug ( revient au même qu'un tableau orange)
        die(""); // arrête le script
    }

    // Requete pour obtenir les infos du film d'après l'ID
    $sql = "SELECT * FROM jeux WHERE id = :idJeu";
    $stmt = $cnx->prepare($sql);
    $stmt->bindValue(":idJeu", $idJeu);
    $stmt->execute();

    $jeu = $stmt->fetch(PDO::FETCH_ASSOC); //Le premier résultat de la requête
    // var_dump($jeu);


    // Requête pour obtenir la note moyenne des utilisateurs
    $sql = "SELECT *, AVG(Valeur) AS Moyenne FROM jeux LEFT JOIN note ON idJeu = note.idJeu WHERE idJeu = :idJeu";

    $stmt = $cnx->prepare($sql);
    $stmt->bindValue(":idJeu", $idJeu);
    $stmt->execute();

    $jeuMoyenne = $stmt->fetch(PDO::FETCH_ASSOC); //Le premier résultat de la requête
    // var_dump($jeuMoyenne);


    // Requête pour obtenir la note de l'utilisateur connecté
    $idUser = $_SESSION["idUser"];
    $sql = "SELECT Valeur FROM note WHERE note.idUser = :idUser AND note.idJeu = :idJeu";

    $stmt = $cnx->prepare($sql);
    $stmt->bindValue("idUser", $idUser);
    $stmt->bindValue(":idJeu", $idJeu);

    $stmt->execute();
    $noteUser = $stmt->fetch(PDO::FETCH_ASSOC); //Attention ne fonctionnera que si on a donné une note pour le jeu car $noteUser contiendra l'array d'un film ou false
    // var_dump($noteUser);


    print("<h1>" . $jeu["Nom"] . "</h1>");
    print("<div>Moyenne des utilisateurs: " . (float)$jeuMoyenne["Moyenne"] . "/5
        <div id = 'ratingStars' data-valeur ='" . $jeuMoyenne["Moyenne"] . "'>
        </div></div><br>");
    print("<img src ='./uploads/" . $jeu["Image"] . "'class = 'affiche'</img><br>");

        // Contrôles pour le panier
    print("<select id ='quantity' data-idJeu = '". $idJeu ."'>");
    for($i = 0; $i < 50; $i++){
        print("<option value = ".$i.">".$i."<option>");
    }
    print("</select>");
    print("<button id = 'btnCart'>🛒</button>");

    // Contenu de la page

    print("<br><p>🎂 A partir de: " . $jeu["Age"] . " ans</p>");
    print("<p>👯 De " . $jeu["Nbr_joueurs_min"] . " à " . $jeu["Nbr_joueurs_max"] . " joueurs</p>");
    print("<p>⌚ Durée moyenne: " . $jeu["Duree"] . " minutes</p>");
    print("<p>Description: <br>" . $jeu["Description"] . "</p>");

    // Il faut donc mettre une valeur par défaut:
    print(" <div>Votre note: " . ($noteUser ? $noteUser["Valeur"] . "/5" : "Pas de note") .
        "<div id = 'ratingUser' data-idJeu = '" . $idJeu . "' data-valeur ='" . ($noteUser ? $noteUser["Valeur"] : "") . "'>
            </div>
        </div>");
        
    ?>

    

</body>

</html>