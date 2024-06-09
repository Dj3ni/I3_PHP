<?php

class PizzaPi
{
    public function calculateDoughRequirement(int $n_pizzas,int $n_person):int
    {
        $grams = $n_pizzas * (($n_person * 20) + 200);
        return $grams;
        throw new \BadFunctionCallException("Implement the function");
    }

    public function calculateSauceRequirement(int $n_pizzas,$can_volume):int
    {
        $cans_to_buy = ($n_pizzas * 125)/$can_volume;
        return $cans_to_buy;
        throw new \BadFunctionCallException("Implement the function");
    }

    public function calculateCheeseCubeCoverage(int $length_cheese, float $cheese_thickness, int $pizza_diameter): int
    {
        return (int) $length_cheese**3 / ($cheese_thickness * pi() *  $pizza_diameter);
        throw new \BadFunctionCallException("Implement the function");
        
    }

    public function calculateLeftOverSlices(int $n_pizzas, int $n_guests):int
    {
        
        $slices = ($n_pizzas*8);
        $slices_left = $slices % $n_guests;      
        return $slices_left;
        throw new \BadFunctionCallException("Implement the function");
    }
}