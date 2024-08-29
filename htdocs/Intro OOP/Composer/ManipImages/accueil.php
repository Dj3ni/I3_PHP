<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("./vendor/autoload.php");

    use Spatie\Image\Image;


    $image = Image::load("./img/Smoothie.jpeg");
    var_dump($image);

    ?>
    
</body>
</html>