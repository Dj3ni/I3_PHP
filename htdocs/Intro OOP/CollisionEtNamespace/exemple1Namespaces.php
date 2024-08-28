<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    include_once("./Film.php");
    include_once("./User.php");

    use Media\Elements\Film as FilmBase; 

    $film1 = new FilmBase([
        "title"=> "Coco",
        "synopsis"=> "Film sur la vie après la mort",
        "duration"=> 90,
        "dateParution"=> new \DateTime(),
        "image" => "",
    ]);



    ?>
</body>
</html>