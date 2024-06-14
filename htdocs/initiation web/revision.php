<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    echo "Voici du PHP";

    ?>

    Voici du HTML
    
    <?php
    echo "Encore du PHP";
    print "<br>";
    echo ("<h3>Titre 3</h3>");

    $nom = "Khaoula";

    if ($nom == "Khaoula"){
        print ($nom . "<br>");
    }
    echo ("<ul>");
    for($i = 0; $i <=20; $i = $i+2){
        echo("<li>". $i . "</li>");
    }

    echo ("</ul>");

    echo("<img src =' ./images/aristochats.jpg'>");
    ?>
    </HTML>
</body>
</html>