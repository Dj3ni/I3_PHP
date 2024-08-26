<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    include_once("./classes/Films.php");
    include_once("./classes/Users.php");
    include_once("./classes/FilmManager.php");

    $film1 = new Film([
        "title"=> "Coco",
        "synopsis"=> "Film sur la vie après la mort",
        "duration"=> 90,
        "dateParution"=> new DateTime(),
        "image" => "",
    ]);
    var_dump($film1);

    // update
    $film1->hydrate([
        "title"=> "Coco2",
    ]);

    var_dump($film1);
    
    $user1 = new User([
        "pseudo" => "Titine",
        "mail" => "tineke@mail.be",
    ]);
    
    // var_dump($user1);

    // create in DB
    $filmManager = new filmManager();
    $filmManager->insert($film1);
    // var_dump($film1);

    // delete in DB
    $filmManager->delete($film1);
    // var_dump($film1);

    // search in DB
    $arrayObjetsFilm = $filmManager->findAll();//renvoie tous les films
    // var_dump($arrayObjetsFilm)

    // update
    $unFilm = $arrayObjetsFilm[1];
    $unFilm->setDuration(3);
    $filmManager->update($unFilm);
    
    ?>
    
</body>
</html>