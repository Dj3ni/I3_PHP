<?php
// print("Je suis généré en php");

// Exemple1:

// $tab = ["Debbie","Anaïs","Mariam"];


// // prend une structure de données
// $resJSON = json_encode($tab);
// // génèr un string JSON
// print($resJSON);


// Exemple2
$p1= [
    "nom" => "Dupont",
    "prenom" => "Lola"
];
$p2= [
    "nom" => "Dupont",
    "prenom" => "Lolo"
];
$p3= [
    "nom" => "Dupont",
    "prenom" => "Lili"
];
    
$tab = [$p1,$p2,$p3];

$resJSON = json_encode($tab);
print($resJSON);




// Exemple 3: 
// $tab = ["nom" => "Dupont",
//     "prenom" => "Lola"];
// $resJSON = json_encode($tab);
// print($resJSON);