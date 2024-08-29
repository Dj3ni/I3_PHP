<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--  -->
    
<?php

$names = ["Jessica","Mélusine", "Khaoula","Emilie","Marwa","Jenny", "Francisco"];

$res = file_get_contents("https://api.dicebear.com/9.x/lorelei/svg");
    var_dump($res);
    echo("<img src = ".$res[0]." alt= 'lorelei'>");

// chercher API images
// foreach($names as $name){
//     $res = file_get_contents("https://api.dicebear.com/9.x/".$name."/svg");
//     var_dump($res);
// }



?>

</body>
</html>