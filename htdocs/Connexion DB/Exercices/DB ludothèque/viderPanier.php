<?php

// On va vider le panier

session_start();

unset($_SESSION['cart']);

unset($_SESSION['totalCart']);

print("panier vidé");

header("location: ./index.php");