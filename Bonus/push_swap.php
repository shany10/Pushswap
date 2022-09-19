<?php
class Pushswap
{
    public $la;
    public $lb = [];
    public $bool;
    public $max;
    public $min;
    public $arr_function = [];
    function __construct($argv)
    {
        array_shift($argv);
        $this->la = $argv;
        $this->bool = false;

        foreach ($this->la as $key => $value) {
            if ($key == 0) {
                $this->max = $value;
                $this->min = $value;
            }
            if ($this->max < $value) {
                $this->max = $value;
            }
            if ($this->min > $value) {
                $this->min = $value;
            }
        }
    }

    function ready()
    {
        if (count($this->la) <= 1 && count($this->lb) == 0 || $this->max == $this->min) {
            echo "\n";
            return;
        }
        if ($this->bool == false) {
            $tableau = $this->la;
        } else {
            $tableau = $this->lb;
        }
        
        switch ($this->bool) {
            case false:

                if ($this->min == $this->la[array_key_last($this->la)]) {
                    $this->rra();
                    return;
                }

                if ($this->max == $this->la[array_key_first($this->la)]) {
                    $this->ra();
                    return;
                }

                if ($this->la[array_key_first($this->la)] > $this->la[array_key_first($this->la) + 1]) {
                    $this->sa();
                    return;
                }
                break;

            case true:
               
                if($this->lb[0] == $this->min && $this->lb[0] == $this->lb[array_key_last($this->lb)]) {
                    $this->pa(0);
                    return;
                }

                if ($this->max == $this->lb[array_key_last($this->lb)]) {
                    $this->rrb();
                    return;
                }

                if ($this->min == $this->lb[array_key_first($this->lb)]) {
                    $this->rb();
                    return;
                }

                if ($this->lb[array_key_first($this->lb)] < $this->lb[array_key_first($this->lb) + 1]) {
                    $this->sb();
                    return;
                }
                break;
        }

        foreach ($tableau as $key => $value) {

            if ($key > 0 && $this->bool == false) {

                if ($tableau[$key] < $tableau[$key - 1]) {
                    $this->pb($key - 1);
                    return;
                }
            } else if ($key > 0 && $this->bool == true) {

                if ($tableau[$key] < $tableau[$key - 1]) {

                    $this->pa($key - 1);
                    return;
                }
            }
        }

        if (count($this->lb) == 1) {
            $this->pa(0);
            return;
        }

        if ($this->bool == false) {

            if (count($this->lb) > 1) {
                $this->bool = true;
                $this->ready();
                return;
            }
        }

        if (is_dir("./Bonus")) {
            include "./Bonus/bonus.php";
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
            return;
        }
        echo implode(" ",  $this->arr_function) . "\n";
    }
    function sa()
    {
        // echo "sa ";
        array_push($this->arr_function, "sa");
        $value  = $this->la[array_key_first($this->la)];
        $this->la[array_key_first($this->la)] = $this->la[array_key_first($this->la) + 1];
        $this->la[array_key_first($this->la) + 1] = $value;
        $this->ready();
    }

    function sb()
    {
        // echo "sb ";
        array_push($this->arr_function, "sb");
        $value  = $this->lb[array_key_first($this->lb)];
        $this->lb[array_key_first($this->lb)] = $this->lb[array_key_first($this->lb) + 1];
        $this->lb[array_key_first($this->lb) + 1] = $value;
        $this->ready();
    }

    function pb($key_1)
    {
        for ($i = 0; $key_1 > $i; $i++) {
            // echo "pb ";
            array_push($this->arr_function, "pb");
            $value = array_shift($this->la);
            array_unshift($this->lb, $value);
        }
        $this->ready();
    }

    function pa($key_1)
    {
        for ($i = 0; $key_1 >= $i; $i++) {
            // echo "pa ";
            array_push($this->arr_function, "pa");
            $value = array_shift($this->lb);
            array_unshift($this->la, $value);
        }

        if (count($this->lb) == 1) {
            $this->bool = false;
            $this->pa(0);
            return;
        }
        $this->ready();
    }

    function ra()
    {
        // echo "ra ";
        array_push($this->arr_function, "ra");
        $value = array_shift($this->la);
        array_push($this->la, $value);
        $this->ready();
    }

    function rb()
    {
        // echo "rb ";
        // return;
        array_push($this->arr_function, "rb");
        $value = array_shift($this->lb);
        array_push($this->lb, $value);
        $this->ready();
    }

    function rra()
    {
        // echo "rra ";
        array_push($this->arr_function, "rra");
        $value = array_pop($this->la);
        array_unshift($this->la, $value);
        $this->ready();
    }

    function rrb()
    {
        // echo "rrb ";
        array_push($this->arr_function, "rrb");
        $value = array_pop($this->lb);
        array_unshift($this->lb, $value);
        $this->ready();
    }
}
$pushswap = new Pushswap($argv);
$pushswap->ready();
