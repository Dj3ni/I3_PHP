<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = "POST"  action = "./TtExe6&8.php">
        <fieldset>
            <legend>Calcul prix TVAC</legend>
            <input type ="number" name = "price">
            <select name = "tva">
                <option value = "0.06">6%</option>
                <option value = "0.12">12%</option>
                <option value = "0.21">21%</option>
            </select>
            <input type ="submit" value ="Calculer le prix TVAC">
        </fieldset>
    </form>

</body>
</html>