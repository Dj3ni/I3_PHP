<?php
include("../Templates/head.php");
?>
<title>Traitement Add Games</title>
</head>
<!-- Header -->
<body>
<?php
include ("../Templates/header.php");
?>
<!-- Main -->
<main>
    <?php
    // var_dump($_POST);
    // var_dump($_FILES);

    // 1. Gérer les uploads
        // Création nom unique
        $uploadDir = "../uploads/";
        $uploadFile = uniqid(). date("d-i-s"). $_FILES["photo"]["name"];        

        // Lien vers le dossier upload
        $uploadPath = $uploadDir . "/" .$uploadFile;

        // Déplacer le fichier temporaire et le stocker dans le serveur (from -to )
        
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadPath)){
            echo ("<br>Ok! Votre fichier a bien été ajouté");
        }
        else {
            echo ("<br>Erreur upload");	
        }
    

    // 2. Pour le reste du formulaire
        // Connection à la DB
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
            // var_dump($e->getMessage());// commenter quand en production, uniquement pour debug ( revient au même qu'un tableau orange)
            die("");// arrête le script
        }

        // Récupérer les données

            $titre = $_POST['titre'];
            $ageMin = $_POST['ageMin'];
            $joueursMin = $_POST['joueursMin'];
            $joueursMax = $_POST['joueursMax'];
            $duree = $_POST['duree'];
            $descript = $_POST['descript'];

        // Une requête du type Insert

        $sql = "INSERT INTO projetjeux (id, NOM, Age, Nbr_joueurs_min,Nbr_joueurs_max,Duree,Description,Image) VALUES (null, :titre, :ageMin, :joueursMin, :joueursMax,:duree,:descript,:image)";


        // Préparer la requête
        $stmt = $cnx->prepare($sql);

        $stmt->bindValue(":titre", $titre);
        $stmt->bindValue(":ageMin",(int)$ageMin);
        $stmt->bindValue(":joueursMin", (int)$joueursMin);
        $stmt->bindValue("joueursMax", (int)$joueursMax);
        $stmt->bindValue(":duree",(int)$duree);
        $stmt->bindValue(":descript", $descript);
        $stmt->bindValue(":image",$uploadFile);        

        // Lancer la requête
        $stmt->execute();
    ?>

</main>
<!-- Footer -->
<?php
include("../Templates/footer.php");
?>
</body>
</html>