<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    print("<br> Exercice 7 :Créez trois arrays contenant le nom, date de naissance et le numéro de téléphone de 3 personnes. Créez un array 'repertoire' contenant ces trois arrays. Affichez le contenu complet du repertoire.<br>");

    $dona = ["Nom" =>"Vervenne","Prénom" =>"Donatienne", "Téléphone"=>"0474/123.456"];
    $isa = ["Nom" =>"Mendoza","Prénom" =>"Isabel", "Téléphone"=>"0474/456.789"];
    $alex = ["Nom" =>"Godefroid","Prénom" =>"Alexia", "Téléphone"=>"0474/789.123"];

    $repertoire = [$dona,$isa,$alex];

    foreach ($repertoire as $person){
        foreach ($person as $key => $value){
            print("<br>".$key." : ".$value);
        }        
    }

    print("<br><br>Exercice 8 : Affichez le'repertoire dans un tableau HTML, choisissez vous-même un format qui vous plaise. Rajoutez au repertoire le contact de votre meilleur ami.<br>");

    $pebbles = ["Nom" =>"Smet","Prénom" =>"Pierre", "Téléphone"=>"0474/135.790"];
    $repertoire[] = $pebbles;

    // Ma façon:
    print("<table>");
    print("<caption>Carnet d'adresses</caption>");    
    foreach ($repertoire as $person){
        print("<tr>");
        foreach ($person as $value){
            print("<td> " . $value ." </td>");
        }
        print("</tr>");         
    }
    print("</table>");
    
    // Correction:
    #1 = on met la structure fixe (table et head)    
    print("<table>");
    print("<head>");
    print("<caption>Carnet d'adresses</caption>"); 
    print("<tr>");
    #2 = on génère l'en-tête
    $cles = array_keys($repertoire[0]); # va donner, on a pris les clés du 1er array [Nom,Prenom,Téléphone].
    #générer un th pour chaque clé<div class=""></div>
    foreach ($cles as $clé){
        print("<th>" . $clé ."</th>");
    }
    print("</tr>");
    print("</head>");
    #3 = remplir le tableau avec les données / générer les lignes
    foreach ($repertoire as $person){
        print("<tr>"); #le tr doit être en-dehors d ela boucle sinon on refait une ligne supplémentaire!
        foreach ($person as $value){
            print("<td> " . $value ." </td>"); #on génére chaque valeur pour la ligne
        print("</tr>");
        }
        
    }
    print("</table>");

    ?>
    <style>
        table,tr,td{
            border :1px solid blue;
        }
    </style>

</body>
</html>