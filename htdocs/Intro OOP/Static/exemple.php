<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("./Medecin.php");

    $m1= new Medecin("dupont","Dupont", "dupont@mail");

    Medecin::setCodeDeontologique("Bien agir");

    ?>
    
</body>
</html>