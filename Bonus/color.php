<?php
$color_gray = "\033[30m";
$color_red = "\033[31m";
$color_green = "\033[32m";
$color_yellow = "\033[33m";
$color_violet = "\033[35m";
$color_blue = "\033[36m";
$blue = "\033[44m";
$green = "\033[42m";
$color = "\033[0m"; 

$arr = [];
foreach ($this->arr_function as $value) {
    switch ($value) {
        case "sa":
            array_push($arr, $color_green . $value . $color);
            break;
        case "sb":
            array_push($arr, $color_yellow . $value . $color);
            break;
        case "pa":
            array_push($arr, $blue . $value . $color);
            break;
        case "pb":
            array_push($arr, $green . $value . $color);
            break;
        case "ra":
            array_push($arr, $color_gray . $value . $color);
            break;
        case "rb":
            array_push($arr, $color_blue . $value . $color);
            break;
        case "rra":
            array_push($arr, $color_red . $value . $color);
            break;
        case "rrb":
            array_push($arr, $color_violet . $value . $color);
            break;
    }
}

echo implode(" ", $arr) . "\n";
