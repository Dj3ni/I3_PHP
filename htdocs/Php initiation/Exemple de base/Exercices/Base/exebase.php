<?php

// Le Vendôme est un cinéma cher (contrairement au Styx, qui d'ailleurs n'existe plus) et de fois ils offrent une réduction du 10% sur les entrées. Affichez le prix d'un ticket normal et le prix qu'on payerait si on avait la réduction

$ticket_normal = 15;
$reduction_10 = $ticket_normal - ($ticket_normal/10);
echo("$reduction_10 euros");

// Créez un programme qui demande son nom à l'utilisateur et affiche un message du style « Bienvenu xxxxxxxx ». Utilisez la fonction "readline(message à afficher)". Cette fonction affice le message à afficher à l'utilisateur, puis permet à l'utilisateur de taper un string sur le clavier. La saisie terminera quand l'utilisateur appuie sur Enter

$name = readline("\nQuel est votre nom?");
print("\nVotre nom est $name"); 

$n_1 = (int)readline("\nEntrez le premier nombre");
$n_2 = (int)readline("\nEntrez le deuxième nombre");

print("\nAddition = " . ($n_1 + $n_2) ." \nSoustraction:".($n_1 - $n_2) ."\nDivision :". ($n_1/$n_2) ."\nMuliplication:". ($n_1*$n_2));


