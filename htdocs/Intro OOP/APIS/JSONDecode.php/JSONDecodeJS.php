<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<script>
    // Prendre une chaine JSON et Générer une structure de données JS

    // Array

    let json1 = "[4,6,7]";
    let arrayJson1 = JSON.parse(json1);
    console.log(arrayJson1);
    console.log(typeof(arrayJson1));

    // Un array d'objets

    let jsonArrayObj = '[{"nom":"pepe","hobby":"natation"},{"nom": "louise","hobby":"natation"}]';
    
    let arrayJsonArrayObj = JSON.parse(jsonArrayObj);
    console.log(arrayJsonArrayObj);
    console.log(typeof(arrayJsonArrayObj));

    // Pour accéder à la valeur à l'intérieur de l'objet
    console.log(arrayJsonArrayObj[1].nom);

    // Si on ne connaît pas la valeur de la clé, on met une variable entre crochets
    let cle = "nom";
    console.log(arrayJsonArrayObj[1][cle]);

</script>

</body>
</html>