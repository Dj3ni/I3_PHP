<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $names = ["Jessica","Mélusine", "Khaoula","Emilie","Marwa","Jenny", "Francisco"];

    $res = file_get_contents("https://api.nationalize.io/?name=Jessica");
    var_dump($res);

    $resDecode = json_decode($res);
    var_dump($resDecode);

    // Accéder au premier résultat
    var_dump($resDecode->country[0]->country_id);

    // Pour afficher pour tout le monde: 
    foreach($names as $name){
        $res = file_get_contents("https://api.nationalize.io/?name=".$name);
    var_dump($res);

    $resDecode = json_decode($res);
    var_dump($resDecode);
    }


?>
    
</body>
</html>