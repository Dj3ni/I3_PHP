<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<nav>    
    <a href="./login.php">Login</a>
    <a href="./inscription.php">Inscription</a>               
</nav>

<form action="Traitements Formulaires/loginTtt.php" method="post">
    
    <div>
        <label for="email">e-mail: </label>
        <input id = "email" type="email" name = "email">
    </div>
    <div>
        <label for="password">Password: </label>
        <input id = "password" type="password" name = "password">
    </div>
    <button type = "submit">Se connecter</button>
    </form>
</body>
</html>