<?php

class Truck extends Vehicule implements IRide {
// We have to implement this function because of heritage from Vehicule
    public function honk():void{
            echo("PWEEEEEEET");
        }
// We have to implements because of Interface
        public function ride():void{
            echo("vrooom");
        }

}