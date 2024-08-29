<?php
include("../Templates/head.php");
?>
<title>Search Game</title>
</head>
<!-- Header -->
<body>
<?php
include ("../Templates/header.php");
?>
<!-- Main -->
<main>
<h2>Rechercher un jeu</h2>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum impedit vitae laudantium ad libero? Sit atque in ad praesentium, reprehenderit enim molestiae amet illum adipisci assumenda debitis harum! Nulla, consectetur!</p>

<form action="../Formulaires Traitement/searchGameTtt.php" method="post">
<div class="mb-3">
    
<input type="text" name = "termeRecherche" class="form-control">
</div>
    <button type ="submit">Rechercher</button> 
</form>
<div id ="resultatRecherche">
    <div id = "nbr">Résultats trouvés</div>
    

</div>




</main>
<!-- Footer -->
<?php
include("../Templates/footer.php");
?>
</body>
</html>