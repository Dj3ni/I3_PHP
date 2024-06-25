<?php

session_start();
if(empty($_SESSION["nomUtilisateur"])){
    header("location: login.php");
}