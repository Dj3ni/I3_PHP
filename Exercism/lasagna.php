<?php

class Lasagna
{
    public function expectedCookTime()
    {
        // Implement the expectedCookTime method
        $lasagna = 40;
        return $lasagna;
    }

    public function remainingCookTime(int $elapsed_minutes)
    {
        // Implement the remainingCookTime method
        $remainingTime = (int) expectedCookTime() - $elapsed_minutes;
        return $remainingTime;
    }

    public function totalPreparationTime($layers_to_prep)
    {
        // Implement the totalPreparationTime method
        $preparationTime = 2*$layers_to_prep;
        return $preparationTime;
    }

    public function totalElapsedTime($layers_to_prep, $elapsed_minutes)
    {
        // Implement the totalElapsedTime method
        $elapsedTime = (int) totalPreparationTime($layers_to_prep)+ $elapsed_minutes;
        return $elapsedTime;
    }

    public function alarm()
    {
        // Implement the alarm method
        if ($CookTime - $elapsed_minutes == 0){
            echo ("Ding!"); 
        }        
    }
}

$cookTime = expectedCookTime();