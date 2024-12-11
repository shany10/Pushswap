<?php
class Pushswap
{
    public $la;
    public $lb = [];
    public $bool = false;
    public $max;
    public $min;
    public $arr_function = [];
    function __construct($argv)
    {
        array_shift($argv);
        $this->la = $argv;
        $this->max = max($argv);
        $this->min = min($argv);
    }

    function ready()
    {
        if (count($this->la) <= 1 && count($this->lb) == 0 || $this->max == $this->min) {
            var_dump($this->la);
            echo "\n";
            return;
        }
        // if (is_dir("./Bonus")) {
        //     echo "[la] => " . implode(" ", $this->la) . "\t\t";
        //     echo "[lb] => " . implode(" ", $this->lb) . "\n";
        //     usleep(500000);
        // }
        if ($this->bool == false) {
            $tableau = $this->la;
        } else {
            $tableau = $this->lb;
        }
        foreach ($tableau as $key => $value) {

            if ($key > 0 && $this->bool == false) {
                if($this->la[array_key_last($this->la)] == min($this->la) && $this->la[0] !== $this->la[array_key_last($this->la)]) {
                    $this->rra();
                    return;
                }
                if ($this->max == $this->la[0]) {
                    $this->ra();
                    return;
                }
                if ($this->min == $this->la[array_key_last($this->la)]) {
                    $this->rra();
                    return;
                }
                if ($this->la[array_key_first($this->la)] > $this->la[array_key_first($this->la) + 1]) {
                    $this->sa();
                    return;
                }
                if ($tableau[$key] < $tableau[$key - 1]) {
                    $this->pb($key - 1);
                    return;
                }
            } else if ($key > 0) {

                if ($this->lb[0] == $this->min && $this->lb[0] == $this->lb[array_key_last($this->lb)]) {
                    $this->pa(0);
                    return;
                }
                if ($this->max == $this->lb[array_key_last($this->lb)]) {
                    $this->rrb();
                    return;
                }
                if ($this->min == $this->lb[0]) {
                    $this->rb();
                    return;
                }
                if ($this->lb[0] < $this->lb[1]) {
                    $this->sb();
                    return;
                }
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
            include "./Bonus/color.php";
            usleep(500000);
            include "./Bonus/danse.php";
            return;
        }
        echo implode(" ",  $this->arr_function) . "\n";        
    }

    function sa()
    {
        array_push($this->arr_function, "sa");
        list($this->la[0], $this->la[1]) = array($this->la[1], $this->la[0]);
        $this->ready();
    }

    function sb()
    {

        array_push($this->arr_function, "sb");
        list($this->lb[0], $this->lb[1]) = array($this->lb[1], $this->lb[0]);
        $this->ready();
    }

    function pb($key_1)
    {
        for ($i = 0; $key_1 > $i; $i++) {
            array_push($this->arr_function, "pb");
            array_unshift($this->lb, array_shift($this->la));
        }
        $this->ready();
    }

    function pa($key_1)
    {
        for ($i = 0; $key_1 >= $i; $i++) {
            array_push($this->arr_function, "pa");
            array_unshift($this->la, array_shift($this->lb));
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
        array_push($this->arr_function, "ra");
        array_push($this->la, array_shift($this->la));
        $this->ready();
    }

    function rb()
    {
        array_push($this->arr_function, "rb");
        array_push($this->lb, array_shift($this->lb));
        $this->ready();
    }

    function rra()
    {
        array_push($this->arr_function, "rra");
        array_unshift($this->la, array_pop($this->la));
        $this->ready();
    }

    function rrb()
    {
        array_push($this->arr_function, "rrb");
        array_unshift($this->lb, array_pop($this->lb));
        $this->ready();
    }
}
$pushswap = new Pushswap($argv);
$pushswap->ready();
