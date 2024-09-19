<?php

namespace App\HydrateTrait;

trait HydrateTrait 
{
    public function hydrate(array $init)
    {
        foreach ($init as $key => $value ){
            $setItem = "set" . ucfirst($key);
            return $this->setItem($value);
        }
    }


}