<?php

// $commande = shell_exec('rm ex_*');
// echo "<pre>$commande</pre>";

function danse($arr, $int)
{
  $max = array_key_last($arr);
  if ($int == $max) {
    return;
  }
  $value = $arr[$int];

  if ($value == 'ready') {
    echo "                       "       .         "\n";
    echo "              o        "       .         "\n";
    echo "            / | \\     "       .         "\n";
    echo "         __/  |  \\__  "       .         "\n";
    echo "             / \\      "       .         "\n";
    echo "          __/   \\__   "       .         "\n";
  }

  // sa

  if ($value == 'sa') {
    echo "                    [sa]  "    .         "\n";
    echo "                  .    "       .         "\n";
    echo "                .      "       .         "\n";
    echo "         __   o        "       .         "\n";
    echo "           \\/ | \\    "       .         "\n";
    echo "              |  \\__  "       .         "\n";
    echo "             / \\      "       .         "\n";
    echo "          __/   \\__   "       .         "\n";
  }

  // sb

  if ($value == 'sb') {
    echo "                    [sb]  "    .         "\n";
    echo "                  .    "       .         "\n";
    echo "                .      "       .         "\n";
    echo "              o   __   "       .         "\n";
    echo "            / | \\/    "       .         "\n";
    echo "         __/  |        "       .         "\n";
    echo "             / \\      "       .         "\n";
    echo "          __/   \\__   "       .         "\n";
  }


  //pb

  if ($value == 'pb') {
    echo "                    [pb]  "    .         "\n";
    echo "                  .    "       .         "\n";
    echo "                .      "       .         "\n";
    echo "            __o        "       .         "\n";
    echo "         __/  | \\     "       .         "\n";
    echo "            __|  \\__  "       .         "\n";
    echo "         __/   \\      "       .         "\n";
    echo "                \\__   "       .         "\n";
  }

  //pa

  if ($value == 'pa') {
    echo "                    [pa]  "    .         "\n";
    echo "                  .    "       .         "\n";
    echo "                .      "       .         "\n";
    echo "              o__      "       .         "\n";
    echo "            / |  \\__  "       .         "\n";
    echo "         __/  |__      "       .         "\n";
    echo "             /   \\__  "       .         "\n";
    echo "          __/          "       .         "\n";
  }

  //ra 

  if ($value == 'ra') {
    echo "                    [ra]  "    .         "\n";
    echo "                  .    "       .         "\n";
    echo "         __     . __   "       .         "\n";
    echo "           |__o__|     "       .         "\n";
    echo "              |        "       .         "\n";
    echo "              |        "       .         "\n";
    echo "             / \\      "       .         "\n";
    echo "            /___\\     "       .         "\n";
  }

  //rb

  if ($value == 'rb') {
    echo "                    [rb] "    .          "\n";
    echo "                  .    "       .         "\n";
    echo "         __     . __   "       .         "\n";
    echo "           |__o__|     "       .         "\n";
    echo "              |        "       .         "\n";
    echo "            __|__      "       .         "\n";
    echo "           |__ __|     "       .         "\n";
    echo "                       "       .         "\n";
  }

  //rra 

  if ($value == 'rra') {
    echo "                    [rra]"     .         "\n";
    echo "                  .    "       .         "\n";
    echo "                .      "       .         "\n";
    echo "              o        "       .         "\n";
    echo "            / | \\     "       .         "\n";
    echo "         __/ /   \\__  "       .         "\n";
    echo "           /  \\       "       .         "\n";
    echo "        __/    \\__    "       .         "\n";
  }

  //rrb

  if ($value == 'rrb') {
    echo "                  [rrb] "      .         "\n";
    echo "                 .     "       .         "\n";
    echo "                .      "       .         "\n";
    echo "              o        "       .         "\n";
    echo "            / | \\     "       .         "\n";
    echo "         __/  \\  \\__ "       .         "\n";
    echo "              / \\     "       .         "\n";
    echo "           __/   \\__  "       .         "\n";
  }

  usleep(400000);
  @system('clear ');
  danse($arr, $int + 1);
}
danse($this->arr_function, 0);
