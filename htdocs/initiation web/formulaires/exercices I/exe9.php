<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method = "POST" action = "./TtExe9.php">
        <fieldset>
            <legend>Réserver une chambre</legend>
            <p>
                <Label>Nombre de lits: </Label><input type = "number" name = "quantity" start = 1>
            </p>
            <p>
                <select name = "bedsize">
                    <Label>Type de lit</Label>
                    <option value = "simple">Simple</option>
                    <option value = "double">Double</option>
                    <option value = "suite">Suite</option>
                </select>
            </p>
            <input type = "submit" value = "Réserver">

        </fieldset>
    </form>
    
    
</body>
</html>