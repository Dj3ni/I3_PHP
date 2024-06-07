<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    print("<br> Exercice 1:Créez un array associatif contenant de couples film-réalisateur. Affichez le contenu en utilisant une boucle foreach <br>");

    $movie_director = [
        "Jurrassic Park" =>"Steven Spielberg",
        "Indiana Jones" => "Steven Spielberg",
        "Star Wars" =>" George Lucas"
    ];
    
    foreach ($movie_director as $key => $value){
        print("<br>" . $key . " : " . $value);
    }

    print("<br> Exercice 2:Remplacez le réalisateur du premier film par 'Ed Wood' <br>");

    $movie_director["Indiana Jones"] = "George Lucas";

    foreach ($movie_director as $key => $value){
        print("<br>" . $key . " : " . $value);
    }








    ?>
    
</body>
</html>