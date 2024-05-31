<?php

$arr = array(4, 5, 1, 3, 2, 9, 6, 8, 7);

function bubbleSort(&$arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
}

function selectionSort(&$arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        $min_idx = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$min_idx]) {
                $min_idx = $j;
            }
        }
        $temp = $arr[$min_idx];
        $arr[$min_idx] = $arr[$i];
        $arr[$i] = $temp;
    }
}

function insertionSort(&$arr) {
    $n = count($arr);
    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $key;
    }
}

function mergeSort(&$arr) {
    if (count($arr) <= 1) {
        return;
    }
    $middle = (int)(count($arr) / 2);
    $left = array_slice($arr, 0, $middle);
    $right = array_slice($arr, $middle);
    mergeSort($left);
    mergeSort($right);
    $arr = merge($left, $right);
}

function merge($left, $right) {
    $result = [];
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] <= $right[0]) {
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    }
    while (count($left) > 0) {
        $result[] = array_shift($left);
    }
    while (count($right) > 0) {
        $result[] = array_shift($right);
    }
    return $result;
}

function quickSort(&$arr) {
    if (count($arr) < 2) {
        return $arr;
    }
    $left = $right = [];
    reset($arr);
    $pivot_key = key($arr);
    $pivot = array_shift($arr);
    foreach ($arr as $k => $v) {
        if ($v < $pivot) {
            $left[$k] = $v;
        } else {
            $right[$k] = $v;
        }
    }
    return array_merge(quickSort($left), [$pivot_key => $pivot], quickSort($right));
}

function sortArray($arr, $algorithm) {
    switch ($algorithm) {
        case 'bubble':
            bubbleSort($arr);
            break;
        case 'selection':
            selectionSort($arr);
            break;
        case 'insertion':
            insertionSort($arr);
            break;
        case 'merge':
            mergeSort($arr);
            break;
        case 'quick':
            $arr = quickSort($arr);
            break;
        default:
            echo "Unknown sorting algorithm.\n";
            return;
    }
    return $arr;
}

echo "Enter sorting algorithm (selection, insertion, merge, quick): ";
$algorithm = trim(fgets(STDIN));

echo "array:\n";
print_r($arr);

$sortedArray = sortArray($arr, $algorithm);

echo "Sorted array using $algorithm sort:\n";
print_r($sortedArray);
?>
