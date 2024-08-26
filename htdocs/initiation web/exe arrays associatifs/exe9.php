<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    print("<br><br> Exercice 9:(Web) Créez un array contenant de noms de sites web (ex: Startpage, Wikipedia), leur lien d'internet (ex: www.startpage.com) et une description de chacun (ex: moteur de recherche).
    <br>");

    $google = ["Nom" =>"Google", "url"=>"https://www.google.com/", "type" => "moteur de recherche"];
    $desmentiel = ["Nom" =>"Dés-mentiel", "url"=>"https://desmentiel.be/", "type" => "site web webshop"];
    $wannaplay = ["Nom" =>"Wanna Play", "url"=>"https://www.wanna-play.be/fr/", "type" => "site web vitrine"];

    $websites = [$google,$desmentiel,$wannaplay];

    // Une fois crée, rajoutez encore deux sites.

    $iello = ["Nom" =>"Iello", "url"=>"https://iello.fr/", "type" => "site web vitrine + webshop"];
    $repos = ["Nom" =>"Repos", "url"=>"https://www.rprod.com/fr", "type" => "site web vitrine + webshop"];

    $websites = [...$websites,$iello,$repos];

    // Affichez le contenu de l'array dans un tableau HTML en utilisant une boucle
    print("<br><table>");
    # 1. Je génère l'en-tête

    print("<head>");
    print("<tr>");

    $clés = array_keys($websites[0]);
    foreach ($clés as $values){
        print("<th>" . $values ."</th>");
    }
    print("</tr>");    
    print("</head>");

    # 2. Je génère le contenu du tableau

    foreach ($websites as $site){
        print("<tr>");
        foreach ($site as $key =>$value){
            if ($key == "url"){
                print("<td><a href ='" .$value."'>$value</a></td>");
            }
            else{
                print("<td> $value</td>");
            }
        }
        print("</tr>");
    }
    print("</table>");

    ?>
    <style>
        table, td, tr {
            border : 3px solid green;            
        }

        th{
            background-color: greenyellow;
        }
    
    </style>
</body>
</html>