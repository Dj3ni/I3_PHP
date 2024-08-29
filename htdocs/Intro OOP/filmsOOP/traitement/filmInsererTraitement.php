<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("../vendor/autoload.php");
    // include_once("../classes/FilmManager.php");
    // include_once("../classes/Films.php");

    var_dump($_POST);

    $fm = new FilmManager();
    // var_dump($fm);

    $title = $_POST["title"];
    $duration = $_POST["duration"];
    $synopsis = $_POST["synopsis"];
    $dateParution = new DateTime($_POST["dateParution"]);
    
    $film = new Film([
        "title"=> $title,
        "duration"=> $duration,
        "synopsis"=> $synopsis,
        "dateParution"=>$dateParution,
    ]);

    ?>
</body>
</html>