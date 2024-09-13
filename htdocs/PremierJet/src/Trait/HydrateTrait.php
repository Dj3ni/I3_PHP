<?php

// 1. Création du Namespace
namespace App\Trait;

// 2. Création du Trait
trait HydrateTrait{

    public function hydrate(array $init = []):void
    {
        foreach ($init as $key =>$value){
            $setName = "set" . ucfirst($key);
            $this->$setName($value);
        }
    }

}



