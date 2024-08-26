<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Si on veut utiliser la méthode post, il faut le spécifier dans la balise form! -->
    <form action = "./tttFormPost.php" method = "post">
        Tapez votre nom <input type ="text" name ="nom">
        Tapez votre prénom <input type ="text" name ="prenom">
        <input type = "submit" value = "Envoyer">      
    </form>

        
</body>
</html>