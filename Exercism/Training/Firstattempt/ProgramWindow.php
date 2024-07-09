<?php

class ProgramWindow{
    public $x;
    public $y;
    public $width;
    public $height;

    public function __construct($x = 0, $y = 0, $height = 600,$width = 800)
    {
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
    }

    public function resize($size){
        $this->width = $size->width;
        $this->height = $size->height;
    }

    public function move($position){
        $this->x = $position->x;
        $this->y = $position->y;
    }
}

class Size{
    public $height;
    public $width;

public function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }
}

class Position{
    public $x;
    public $y;

    public function __construct($y, $x){
        $this->x = $x;
        $this-> y = $y;
    }
}

