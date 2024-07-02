<?php
if(session_id()==="")session_start();

?>
<nav>
    <a href="./index.php">Home</a>
    <a href="./LudoInsert.php">Ajouter un jeu</a>
    <!-- <a href="LudoSearch.php">Chercher un jeu</a> -->
    <a href="./ajaxSearch.php">Recherche Ajax</a>
    <a href="./logout.php">Logout</a>
    
    <div class = "cart-container">
        <div class = "cart-logo">
            <a href="./checkout.php">
                <img src="./assets/img/cart.jpg">
            </a>
        </div>
        <div id = "cartLink">
        <?php
            // var_dump($_SESSION);
            if(isset($_SESSION['totalCart'])){
                echo($_SESSION['totalCart']);
            }
            else{
                echo(0);
            }
            ?>
        </div>
    </div>
</nav>

