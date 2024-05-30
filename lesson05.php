<?php
    $arr = array(5, 2, 7, 9, 8, 1, 3, 6, 4);

    function bubbleSort(&$arr) {
        $n = count($arr);
        for($i = 0; $i < $n - 1; $i++) {
            for($j = 0; $j < $n - $i - 1; $j++) {
                if($arr[$j] > $arr[$j + 1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }
    }

    bubbleSort($arr);

    foreach ($arr as $value) {
        echo $value . " ";
    }