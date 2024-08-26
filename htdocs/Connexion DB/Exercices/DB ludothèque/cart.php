<?php
// Le rôle de cette page est de stocker les éléments ajoutés au panier

// 1. Démarrer la session
session_start();

// 2. Vérifier si panier existe sinon, le créer et le stocker dans la session

if(empty($_SESSION['cart'])){
    $cart = [];
    $_SESSION['cart'] = $cart; //Je crée la table panier dans la session (avec username et userid)
    // print("nouveau panier");
}
// else{
//     print("le panier existe déjà");
// }

// 3. Obtenir les éléments envoyés par la sélection du panier
$idJeu = $_POST['idJeu'];
$quantity = $_POST['quantity'];

// 4. Ajouter ces éléments dans le tableau panier

$cart = $_SESSION["cart"]; //obtenir le panier de la session (on fait une copie)

if(isset($cart[$idJeu])){ // Si c'est déjà dans le panier
    // Rajouter la nouvelle quantité
    $cart[$idJeu] += $quantity;
}
else{
    $cart[$idJeu] = (int)$quantity; //ajouter dans la session
}

// var_dump($cart);
$_SESSION["cart"] = $cart; //ajouter dans la session
// var_dump($_SESSION);

// 5. Afficher la quantité d'articles sur l'icone panier

$totalQuantity = 0;

foreach ($cart as $quantity){
    $totalQuantity += $quantity;
}

// On l'ajoute dans la session (on le crée)
$_SESSION["totalCart"] = $totalQuantity;

    //stocker la réponse dans un Json
    $response = [
        'message'=> "Produit ajouté au panier",
        "totalQuantity" => $totalQuantity,
    ];

    print(json_encode($response));


?>