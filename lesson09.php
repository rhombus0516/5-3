<?php

    function euclidean($x, $y) {
        if ($y == 0) {
            return $x;
        }
        return euclidean($y, (int)$x % $y);
    }

    var_dump(euclidean(12,18));
