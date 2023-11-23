<?php 
function plusMinus($arr) {
    $positiveCount = 0;
    $negativeCount = 0;
    $zeroCount = 0;

    foreach ($arr as $value) {
        if ($value > 0) {
            $positiveCount++;
        } elseif ($value < 0) {
            $negativeCount++;
        } elseif ($value == 0) {
            $zeroCount++;
        }
    }

    $totalCount = count($arr);

    return number_format($positiveCount / $totalCount, 6) . "\n" . 
           number_format($negativeCount / $totalCount, 6) . "\n" . 
           number_format($zeroCount / $totalCount, 6);
}

echo plusMinus([-4, 3, -9, 0, 4, 1]);
?>
