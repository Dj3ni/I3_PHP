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

    public function pair(string $sweetheart_a, string $sweetheart_b): void
    {
        $pair = $this->initials($sweetheart_a) ." + ".$this->initials($sweetheart_b);
        $height_heart = 14;
        $width_heart = 28;
        $space = " ";
        $star = "*";

        for($i = 0;$i<= $height_heart; $i++){
            if ($i === 1){
                echo(str_repeat($space,5) . str_repeat($star,6) .str_repeat($space,7) .str_repeat($star,6));
            }
            elseif($i === 2){
                echo("\n" . str_repeat($space,3) . str_repeat($star,2) .str_repeat($space,6) .str_repeat($star,2).str_repeat($space,3) . str_repeat($star,2) .str_repeat($space,6) .str_repeat($star,2));
            }
            elseif($i === 3){
                echo("\n" . str_repeat($space,1) . str_repeat($star,2) .str_repeat($space,9) .str_repeat($star,2).str_repeat($space,1) . str_repeat($star,2) .str_repeat($space,9) .str_repeat($star,2));
            }
            elseif($i === 4){
                echo("\n" . str_repeat($star,2) .str_repeat($space,12) .str_repeat($star,1) .str_repeat($space,12) .str_repeat($star,2));
            }

            elseif($i === 5){
                echo("\n" . str_repeat($star,2) .str_repeat($space,25) .str_repeat($star,2));
            }
            elseif($i === 6){
                echo("\n" . str_repeat($star,2) .str_repeat($space, (($width_heart - strlen($pair))/2)) . $pair .str_repeat($space, (($width_heart - strlen($pair))/2)-2).str_repeat($star,2));
            }
            elseif(6 < $i  && $i <= 12){
                $j = 0;
                $k = 23;
                for( $i = 7 ; $i <= 12 ; $i++){
                    echo("\n" . str_repeat($space,(1+$j)).str_repeat($star,2) .str_repeat($space,($k)) .str_repeat($star,2));
                    $j += 2;                 
                    $k -= 4;
                }                
            }
            elseif($i === 13){
                echo("\n" .str_repeat($space,13) .str_repeat($star,3));
            }
            elseif($i === 14){
                echo("\n" .str_repeat($space,14) .str_repeat($star,1));
            }
        }
    }
}

$sweetheart = new HighSchoolSweetheart();
$sweetheart->pair("Blake Miller", "Riley Lewis");