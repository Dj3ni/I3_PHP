<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Rappel de ce qu'on peut faire avec un tableau indexé
    $tab = ["Jessica", "Amalia","Leslie"];
    $tab[1] = "Charifa";
    unset($tab[2]);
    $tab[] = "Lola";

    // Tableau associatif, CRUD (create, read, update, delete)
    $personne = ["prénom" => "Mélusine", "hobby" => "natation"];
    # Read
    print("<br>Le hobby de " . $personne["prénom"] . " est  ". $personne["hobby"]);
    # Update
    $personne["hobby"] = "escalade";
    print("<br>Le hobby de " . $personne["prénom"] . " est  ". $personne["hobby"]);
    #Create
    $personne["age"] = 27;
    print("<br>" . $personne["prénom"]." a ".$personne["age"]. " ans");
    #Delete
    unset ($personne["age"]);

    // Itérer sur ce type de tableau

    #Rechercher les valeurs du tableau
    foreach ($personne as $value){
        print("<br>" .$value);
    }
    #Rechercher les clés
    foreach ($personne as $key =>$value){
        print("<br>" .$key . " : " .$value);
    }
    #Récupérer que les clés
    $keys = array_keys($personne);
    
    foreach ($keys as $key){
        print("<br>" . $key . "<br>");        
    }
    
    
    // Pour chercher dans un tableau de tableaux:
    $personne1 = ["prénom" => "Mélusine", "hobby" => "natation", "nationalité"=> "belge"];
    $personne2 = ["prénom" => "Kenza", "hobby" => "jeux de société", "nationalité"=> "belge"];
    $personne3 = ["prénom" => "Mélusine", "hobby" => "lire","nationalité"=> "belge"];

    $eleves = [$personne1,$personne2,$personne3]; # ce tableau est indexé mais contient des tableaux associatifs
    
    #Modifier la passion d'un élève:
    $eleves[1]["hobby"] = "écrire";

    

    #ajouter un tableau comme valeur
    $eleves[1]["nationalité"] = ["belge", "marocaine"];

    #afficher clés et valeurs de tous les tableaux:
    foreach ($eleves as $eleve){
        foreach($eleve as $key =>$value){
            print("<br>". $key." : " );
            if (is_array($value)){ # cette partie-ci est rajoutée ssi la valeur est un array!
                foreach ($value as $val){
                    print($val . " , ");
                }
            }
            else {
                print($value);       
            }
        }
    }




    ?>
    
</body>
</html>