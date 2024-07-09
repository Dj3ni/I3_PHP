<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include("./Series.php");

$actorsList1 = [
    "Matthew Perry",
    "Jennifer Aniston",
    "Lisa Kudrow",
    "David Schwimmer",
    "Courteney Cox",
    "Matt LeBlanc",
];

$serie1 = new Serie("Friends", 10, $actorsList1);
$serie1->displaySerie();



?>
    
</body>
</html>