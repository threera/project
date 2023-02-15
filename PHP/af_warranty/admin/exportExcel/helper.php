<?php
function colExcel($numCol)
{
    $arrayCol = [];
    $textCol  = '';
    $round    = ceil($numCol / 25);
    $alphabet = range('A', 'Z');

    for ($i = 0; $i < ($round); $i++) {
        $loopExcel  = loopExcel($textCol, $numCol);
        $numCol     = $numCol - 25;
        $arrayCol   = array_merge($arrayCol, $loopExcel);
        $textCol    = $alphabet[$i];
    }

    return $arrayCol;
}

function numberToAlphabet($num)
{
    $numeric = $num % 26;
    $letter = chr(65 + $numeric);
    $num2 = intval($num / 26);
    if ($num2 > 0) {
        return numberToAlphabet($num2 - 1) . $letter;
    } else {
        return $letter;
    }
}

function loopExcel($textCol, $numCol)
{
    $arrayCol = [];
    $alphabet = range('A', 'Z');
    foreach ($alphabet as $key => $value) {
        if ($numCol > 0) {
            $arrayCol[] = $textCol . $value;
            $numCol--;
        }
    }

    return $arrayCol;
}
