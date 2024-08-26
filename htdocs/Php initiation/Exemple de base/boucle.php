<?php

$name = readline("Quel est votre nom?");
$age = (int)readline("\nQuel est votre âge?");

while ($age < 18){
    $age = (int)readline("\nQuel est votre âge?");
}
print("\nLibéréééééée, délivrééée!");


// Boucle while

$countdown = 10;
while ($countdown != 0){
    print("\n$countdown");
    $countdown -= 1;
}
print("\ndécollage!");

$count = 1;

while ($count <= 10){
    print("\n $count");
    $count ++; #identique à $count += 1

}

// Boucle for
// initiation variable ; condition pour rester dans la boucle;  incrémentation)

for($count = 1; $count <= 10; $count ++){
    print("\n $count");
}

// Exercice: afficher les valeurs entre 30 et 50

for($count = 30; $count <=50; $count ++){
    print("\n $count");
}



