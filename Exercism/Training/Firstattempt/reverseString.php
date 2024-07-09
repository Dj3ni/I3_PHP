<?php

// Code sent on the website

declare(strict_types=1);
function reverseString(string $text): string
{
    $char = str_Split($text);
    $reverse = array_reverse($char);
    return $newString = implode($reverse);
}

// Official Php fucntion

strrev($string);

// function reverseString(string $text): string
// {
//     strrev($text);
// }
