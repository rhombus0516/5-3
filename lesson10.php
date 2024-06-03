<?php

    function hanoi($n, $from, $to, $aux) {
        if ($n == 1) {
            echo "$from から $to に移動\n";
            return;
        }
        hanoi($n - 1, $from, $aux, $to);
        echo "$from から $to に移動\n";
        hanoi($n - 1, $aux, $to, $from);
    }

    $n = 3;

    hanoi($n, 'A', 'C', 'B');