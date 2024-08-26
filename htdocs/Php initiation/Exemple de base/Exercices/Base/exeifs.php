<?php

// 1. Créez un code capable de calculer la surface d'une chambre. Demandez à l'utilisateur la largeur et la longueur. Si les valeurs sont pareilles, affichez le message "La chambre est carrée!"

// $long = (int)readline("\nQuelle est la longueur de la pièce?");
// $larg = (int)readline("\nQuelle est la longueur de la pièce?");

// if ($long === $larg){
//     print("\nCette pièce est carrée\n");
// }

// 2. Demandez à l'utilisateur la température de la salle où il se trouve. Si elle vaut entre 15 et 25 affichez "Il fait bon". Si la valeur est inférieure, affichez "Ça caille !! Montez la température !" et si la valeur est supérieure affiche "Trop chaud ! Descendez la température !"

// $temp = (int)readline("Quelle est la température de la salle?\n");

// // while ($temp != 0){
// if ($temp > 25){
//     print("Il fait douff, ouvrez la fenêtre!!\n");
// }
// elseif ($temp < 15){
//     print("ça caille!!! Montez la température\n");
// }
// else{    
//     print("Il fait bon ici\n");
// }
// // }

// 5. Demandez deux chiffres à l'utilisateur et une opération à réaliser avec ces deux chiffres (addition, multiplication, soustraction et division). Affichez le calcul correspondant.

// 4. Nous faisons un système informatique pour une école. Pour qu'un élève puisse réussir une matière il doit assister à un minimum de cours :

//     80% des cours s'il est en 1ere année
    
//     70% des cours s'il est en 2eme année
    
//     60% des cours s'il est en 3eme année
    
//     Considérez qu'il y a 50 cours chaque année. Le script doit demander à l'utilisateur l'année et le nombre d'absences, et afficher si l'élève a reussi ou pas.

// 5 Nous voulons calculer le prix d'une commande dans un magasin de téléphonie. On vend juste trois produits :
// Samsung Galaxy S24 - 1000 euros
// IPhone 15 - 1500 euros
// Huawei P60 Pro - 800 euros
// Demandez à l'utilisateur le nombre d'unités qu'il veut acheter de chaque produit (fonction "readline" ;) )

// Calculez le total de la commande sachant que :

// Si on commande plus de 5 unités d'un certain produit on a une remise du 10% sur le prix de ce produit. Les produits peuvent être retirés au magasin ou livrés. La livraison coute 2% du prix total de la commande, mais elle est gratuite si notre commande dépasse 100 euros. Une carte de fidélité accorde 20% de réduction sur le prix total de la commande

$price_S24 = 1000;
$price_I15 = 1500;
$price_P60 = 800;

$quantity_S24 = (int)readline("\nCombien de S24 souhaitez-vous commander?");
$quantity_I15 = (int)readline("\nCombien de I15 souhaitez-vous commander?");
$quantity_P60 = (int)readline("\nCombien de P60 souhaitez-vous commander?");

// Calcul remise
if ($quantity_S24 > 5){
    $price_S24 = $price_S24 / 10;
}

if ($quantity_I15 > 5){
    $price_I15 = $price_I15 / 10;
}

if ($quantity_P60 > 5){
    $price_I15 = $price_I15 / 10;
}

// Commande
$book_S24 = $quantity_S24 * $price_S24;
$book_I15 = $quantity_I15 * $price_I15;
$book_P60 = $quantity_P60 * $price_P60;

$book_price = array($book_S24, $book_I15 ,$book_P60);
$subtotal_price = array_sum($book_price);

print("\nSous-total de la commande: $subtotal_price euros");

// Carte de fidélité

$fidelity = readline("\nAvez-vous une carte de fidélité?");

if ($fidelity == "oui"){
    $subtotal_price = $subtotal_price * 0.8;
    print("\nSous-total avec fidélité: $subtotal_price");
}

// Livraison

$sending = readline("\nVoulez-vous être livré?");

if ($sending == "non"){
    if ($subtotal_price >= 3000){
        $subtotal_price = $subtotal_price * 1.02;
        print("\nSous-total, livraison comprise : $subtotal_price");
    }
}

print("\nLe prix total de votre commande est: $subtotal_price euros");


// """
// Correction

// """"

// $price_S24 = 1000;
// $price_I15 = 1500;
// $price_P60 = 800;

// $quantity_S24 = (int)readline("\nCombien de S24 souhaitez-vous commander?");
// $quantity_I15 = (int)readline("\nCombien de I15 souhaitez-vous commander?");
// $quantity_P60 = (int)readline("\nCombien de P60 souhaitez-vous commander?");

// # Reduction
// if($quantity_S24 >5){
//     $price_S24 *= 0.9;
// }

// if ($quantity_I15 > 5){
//     $price_I15 *= 0.9;
// }

// if ($quantity_P60 > 5){
//     $price_I15 *= 0.9;
// }

// # calcul sous-total
// $sous_total = $quantity_S24 * $S24 + $quantity_I15 * $price_I15 + $quantity_P60 * $price_P60;

// #carte de fidélité

// $fidelite = readline("\nCarte de fidélité?");

// if ($fidelite == "oui"){
//         $sous_total = $sous_total * 0.80;
// }

// # livraison

// $livraison = readline("Voulez-vous");

// if ($livraison == "oui"){
//     if($sous_total < 3000){
//         $sous_total = $sous_total * 1.02;
//     }
// }

