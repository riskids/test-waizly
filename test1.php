<?php
function minMaxSum($nomor){
    sort($nomor);
    
    $min_number = array_sum(array_slice($nomor, 0, count($nomor) - 1));
    $max_number = array_sum(array_slice($nomor, 1));

    return $min_number.' '.$max_number;
}

echo minMaxSum([1,2,3,4,5]);
?>
