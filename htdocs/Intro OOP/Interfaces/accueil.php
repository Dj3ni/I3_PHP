<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("./ExempleVehicule/Vehicule.php");
    include_once("./ExempleVehicule/IRide.php");
    include_once("./ExempleVehicule/Truck.php");
    
    $c = new Truck();
    $c->display();
    $c->honk();


    ?>
</body>
</html>