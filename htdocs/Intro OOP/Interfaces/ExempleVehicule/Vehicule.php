<?php
abstract class Vehicule {
    public string $code;

    public function display():void{
        echo("Je suis un" .get_class($this));
    }

    public abstract function honk():void;

}