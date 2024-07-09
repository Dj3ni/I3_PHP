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
        return $this->firstLetter($name) . ".";
        
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
        $pair = $this->initials($sweetheart_a) ."  +  ".$this->initials($sweetheart_b);
        $height_heart = 14;
        $width_heart = 28;
        $space = " ";
        $star = "*";
        $heart = '';

        for ($i = 0; $i <= $height_heart; $i++) {
            if ($i === 1) {
                $heart .= str_repeat($space, 5) . str_repeat($star, 6) . str_repeat($space, 7) . str_repeat($star, 6);
            } elseif ($i === 2) {
                $heart .= "\n" . str_repeat($space, 3) . str_repeat($star, 2) . str_repeat($space, 6) . str_repeat($star, 2) . str_repeat($space, 3) . str_repeat($star, 2) . str_repeat($space, 6) . str_repeat($star, 2);
            } elseif ($i === 3) {
                $heart .= "\n" . str_repeat($space, 1) . str_repeat($star, 2) . str_repeat($space, 9) . str_repeat($star, 2) . str_repeat($space, 1) . str_repeat($star, 2) . str_repeat($space, 9) . str_repeat($star, 2);
            } elseif ($i === 4) {
                $heart .= "\n" . str_repeat($star, 2) . str_repeat($space, 12) . str_repeat($star, 1) . str_repeat($space, 12) . str_repeat($star, 2);
            } elseif ($i === 5) {
                $heart .= "\n" . str_repeat($star, 2) . str_repeat($space, 25) . str_repeat($star, 2);
            } elseif ($i === 6) {
                $heart .= "\n" . str_repeat($star, 2) . str_repeat($space, (($width_heart - strlen($pair)) / 2) - 1) . $pair . str_repeat($space, (($width_heart - strlen($pair)) / 2) - 1) . str_repeat($star, 2);
            } elseif (6 < $i && $i <= 12) {
                $j = 0;
                $k = 23;
                for ($line = 7; $line <= 12; $line++) {
                    $heart .= "\n" . str_repeat($space, (1 + $j)) . str_repeat($star, 2) . str_repeat($space, ($k)) . str_repeat($star, 2);
                    $j += 2;
                    $k -= 4;
                }
                $i = 12; // Permet de s'assurer que $i a bien la bonne valeur après la boucle
            } elseif ($i === 13) {
                $heart .= "\n" . str_repeat($space, 13) . str_repeat($star, 3);
            } elseif ($i === 14) {
                $heart .= "\n" . str_repeat($space, 14) . str_repeat($star, 1);
            }
        }
        return $heart;
    }
}

$sweetheart = new HighSchoolSweetheart();
$sweetheart->pair("Blake Miller", "Riley Lewis");