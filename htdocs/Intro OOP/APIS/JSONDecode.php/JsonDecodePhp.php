<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// Transformer un string JSON dans un élément PHP

$arrayJson = '["Jenny","Leslie","Doroth\u00e9e"]';
var_dump($arrayJson);

$arrayJsonDecode = json_decode($arrayJson);
var_dump($arrayJsonDecode);

// Transformer un string JSON dans un objet
$arrayObjJson = '{"nom":"Louise","hobby":"natation"}';

$arrayObjJsonDecode = json_decode($arrayObjJson);
var_dump($arrayObjJsonDecode);

?>
    
</body>
</html>