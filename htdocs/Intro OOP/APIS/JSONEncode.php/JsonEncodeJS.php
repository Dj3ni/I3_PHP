<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <script>
        console.log("Exemple de stringify:");

        // Encoder un array JS en JSON

        let array = $tab = ["Jenny","Leslie","Dorothée"];
        let arrayJson = JSON.stringify(array);
        console.log(typeof(arrayJson)+":"+ arrayJson);

        // Encoder un objet JS en JSON

        let objPersonne = {
            "nom":"Pépé",
            "hobby":"natation",
        }
        let objPersonneJson = JSON.stringify(objPersonne);
        console.log(typeof(objPersonneJson)+":"+ objPersonneJson);

    </script>
    
</body>
</html>