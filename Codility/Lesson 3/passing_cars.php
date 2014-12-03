<?php

$A = array(0, 1, 0, 1, 1);
echo solution($A);

function solution($A)
{
    $EAST = 0;
    $WEST = 1;

    $eastCount = 0;
    $passingPairs = 0;
    foreach($A as $index => $carDirection) {
        if($carDirection == $WEST) {
            $passingPairs += $eastCount;
        } else {
            $eastCount++;
        }
    }

    return $passingPairs;
}
