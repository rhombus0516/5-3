<?php

    $arr = [2, 9, 7, 5, 8, 1, 3, 4, 6];
    $target = 4;

    // 元の配列のインデックスを保持するための連想配列を作成
    $indexedArr = [];
    foreach ($arr as $index => $value) {
        $indexedArr[] = ['value' => $value, 'original_index' => $index];
    }

    // 値でソート
    usort($indexedArr, function($a, $b) {
        return $a['value'] <=> $b['value'];
    });

    function search($arr, $target) {
        $left = 0;
        $right = count($arr) - 1;

        while ($left <= $right) {
            $mid = (int)(($left + $right) / 2);

            if ($arr[$mid]['value'] == $target) {
                echo "要素" . $target . "は元の配列の" . $arr[$mid]['original_index'] . "に見つかりました\n";
                return;
            } elseif ($arr[$mid]['value'] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }
        echo "要素" . $target . "は配列内に見つかりませんでした\n";
    }

    search($indexedArr, $target);