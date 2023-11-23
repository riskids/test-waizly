<?php

function timeConversion($time){
    $convert = "";

    $h1 = $time[1];
    $h2 = $time[0];
    $hfinal = ($h2 * 10 + $h1 % 10);

    if ($time[8] == "A") {
        $convert .= ($hfinal == 12) ? "00" : substr($time, 0, 8);
    } else {
        $convert .= ($hfinal == 12) ? "12" . substr($time, 2, 6) : ($hfinal + 12) . substr($time, 2, 6);
    }

    return $convert;
}

echo timeConversion("07:05:45PM");
?>
