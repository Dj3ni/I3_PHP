<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    // Encoder un array

    $tab = ["Jenny","Leslie","Dorothée"];
    var_dump($tab);

    $tabJson = json_encode($tab);
    var_dump($tabJson); // l'encodage est TOUJOURS en string!

    // Encoder un array associatif

    $tabAssoc = [
        "nom" => "Pepe",
        "nationalité" => "Belge",
    ];
    var_dump($tabAssoc);

    $tabAssocJson = json_encode($tabAssoc);
    var_dump($tabAssocJson);

    // Encoder un array d'arrays simples

    $tabArrays = [
        ["Mélusine","Debbie","Jessica"],
        ["Charifa","Khaoula", "Amalia"],
    ];

    $tabArraysJson = json_encode($tabArrays);
    var_dump($tabArraysJson);

    // Encoder un array d'array associatifs

    $tabArraysAssoc = [
        [
            "nom" => "pommes",
            "prix"=> 3,
        ],
        [
            "nom" => "poires",
            "prix"=> 2,
        ],
    ];

    $tabArraysAssocJson = json_encode($tabArraysAssoc);
    var_dump($tabArraysAssocJson);

    // Encoder un objet d'une classe

    class Person {
        public string $nom;
        public string $hobby;
    }

    $p = new Person();
    $p->nom ="Louise";
    $p->hobby = "natation";

    $objJson = json_encode($p);
    var_dump($objJson);


    ?>
    
</body>
</html>