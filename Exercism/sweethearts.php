<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        $name = ltrim($name);
        return $name[0];
    }

    public function initial(string $name): string
    {
        $name = strtoupper($name);

        return $this->firstletter($name) . ".";
        
    }

    public function initials(string $name): string
    {
        $full_name = explode(" ",$name);
        $result = "";

        foreach ($full_name as $key =>$value){
            if ($key === 0){
                $result = $result .$this->initial($value); 
            }
            else{
                $result = $result." " .$this->initial($value);
            }
        }            
        return $result;
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        $pair = $this->initials($sweetheart_a) ." + ".$this->initials($sweetheart_b);

        $height_heart = 14;
        $width_heart = 28;
        $space = " ";
        $star = "*";

        $heart = [$height_heart,$width_heart];

        for($i = 0;$i<= $height_heart; $i++){
            if ($i === 1){
                echo($space*5 . $star*6 .$space*7 .$star*6);
            }
        }
        
    }
}

$sweetheart = new HighSchoolSweetheart();
$sweetheart->pair("Blake Miller", "Riley Lewis");