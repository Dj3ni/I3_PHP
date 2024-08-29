<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Si on ne spécifie pas le type de formulaire, il va automatiquement créer un formulaire get -->
    <!-- ./fait référence à une page dans le même dossier. -->
    <form action ="./traitementForm.php"> 
        Tapez votre nom <input type ="text" name ="nom">
        Tapez votre prénom <input type ="text" name ="prenom">
        <!-- on utilise l'attribut "name" pour que l'on puisse utiliser la donnée qui a été remplie (on va y accéder via cet attribut en y faisant référence)-->
        <input type = "submit" value = "Envoyer">      


    </form>

    
</body>
</html>