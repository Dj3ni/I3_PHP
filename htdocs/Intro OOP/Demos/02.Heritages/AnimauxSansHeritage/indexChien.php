<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("./Chien.php");

    $chien1 = new Chien("Laika", "Samoyede");
    $chien1->affiche();
    $chien1->communique();

    include("./Chat.php");
    $chat1 = new Chat("Smoothie", "Main Coon");
    $chat1->affiche();
    $chat1->communique();


?>
</body>
</html>