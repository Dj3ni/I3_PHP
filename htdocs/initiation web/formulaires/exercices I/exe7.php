<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Création du formulaire -->
    <form method = "POST"  action = "./TtExe7.php">
            <fieldset>
                <legend>Choisis ton animal préféré</legend>
                <select name = "animal">
                    <!--  On insère une balise php afin que l'action se passe directement sur la page -->
                    <?php
                        // On crée un array avec les différentes données
                        $images = [
                            "chien" => "chien.jpg",
                            "chat" => "aristochats.jpg",
                            "oiseau" => "zazu.jpg",
                            ];
                        // On  va boucler afin de créer les balises de sélection en fonction de la base de données (array)
                        foreach ($images as $animal => $lien){
                            echo("<option value = ' " . $lien . "'>" . $animal . "</option>");
                        }
                    ?>
                </select>
                <input type ="submit" value ="Envoyer">
            </fieldset>
        </form>
    
</body>
</html>