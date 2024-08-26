<?php
if(session_id()==="")session_start();

?>
<div class="div-nav">
<nav class = "nav-bar">
    <div class = "logo-site">
        
        <a href="./index.php">
            <img src="./assets/img/icon.jpg" alt="logo site">
        </a>
    </div>
    <ul class = "nav-links">
        <li>
            <a href="./index.php">Home</a>
        </li>
        <li>
            <a href="./LudoInsert.php">Ajouter un jeu</a>
        </li>
        <!-- <li>
            <a href="LudoSearch.php">Chercher un jeu</a> -->
        <!-- </li> -->
        <li>    
            <a href="./ajaxSearch.php">Recherche Ajax</a>
        </li>
        </ul>

        <div class = "cart-container">
            <div class = "cart-logo">
                <a href="./checkout.php">
                    <img src="./assets/img/cart-outline.png">
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

        <div class = "avatar dropdown">
            <div class = "avatar-container">
                <?php
                if(isset($_SESSION['avatar'])){
                    echo("<img src = '' alt ='avatar'>");
                }
                else{
                    echo("<img src = './assets/img/defaultAvatar.jpg' alt ='avatarDefault'>");
                }

                ?>
            </div>
            <div class = "user-name ">
                <button class = "dropBtn">
                <?php
                // var_dump($_SESSION);
                echo($_SESSION['nomUtilisateur']);
                ?>
                <i class = "arrow"></i>
                </button>                
            </div>
            <div class = "dropdown-content">
                <a href="./logout.php">Logout</a>
            </div>
        </div>
</nav>
</div>

