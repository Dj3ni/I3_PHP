<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Loto</h1>

    <h2>6.000.000 d'euros à gagner, tentez votre chance!</h2>

    <form action = "./TtExe5.php" method = "post">
        <fieldset>
        <legend>Saisissez 6 chiffres entre 0 et 41:</legend>
        <ul>
            <p><label>Saisissez la première valeur: </label><input type = "number" name = "chiffre[]"></p>
            <p><label>Saisissez la deuxième valeur: </label><input type = "number" name = "chiffre[]"></p>
            <p><label>Saisissez la troisième valeur: </label><input type = "number" name = "chiffre[]"></p>
            <p><label>Saisissez la quatrième valeur: </label><input type = "number" name = "chiffre[]"></p>
            <p><label>Saisissez la cinquième valeur: </label><input type = "number" name = "chiffre[]"></p>
            <p><label>Saisissez la sixième valeur: </label><input type = "number" name = "chiffre[]"></p>
        </ul>

        <input type ="submit" value = "Envoyer" >

        </fieldset>
    <form>

    <br>

    <img src = "../../images\lotto.png">

    <style>
        form { 
            text-align: center;
        }

    </style>
    
</body>
</html>