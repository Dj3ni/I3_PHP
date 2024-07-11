<?php
include_once("./Animal.php");

class Chat extends Animal {
    public function tomberDebout():void{
        print("<br>Je suis toujours debout");
    }

    public function communique():void{
        echo ("<br>Miaou!");
    }
}