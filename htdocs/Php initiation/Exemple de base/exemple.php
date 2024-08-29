<?php

echo("Hello, World!\n");
print("Hello WAD!");

$nom = readline ("\nTapez votre nom:");

$age = (int)readline("\nQuel est votre âge?");

$ageSTR = "100";
$ageINT = (int)$ageSTR;

print("\nJ'ai " . $age . " ans");
print("\nJ'ai $age ans");
print("\nBonjour, je m'appelle $nom et j'ai $age ans.");

if ($age >= 18){
    print("\nVous êtes majeur.");
}
else {
    print("Vous êtes mineur.");
}

if ($age > 100){
    print("\nVous êtes trop vieux");
}
else if ($age < 18){
    print("\nVous êtes mineur.");
}
else{
    print("\nVous êtes majeur.");
}




?>