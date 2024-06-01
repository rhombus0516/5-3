<?php
    $datas = [2, 9, 7, 5, 8, 1, 3, 4, 6];

    for($i = 0; $i < count($datas); $i++) {
        if($datas[$i] == 7) {
            print_r("探索回数".($i+1)."回\n");
            print_r("要素はインデックス".($i)."にあります");
        }
    }