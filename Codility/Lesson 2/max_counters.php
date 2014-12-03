<?php

$N = 5;
$A = [3, 4, 4, 6, 1, 4, 4];

echo solution($N, A);

function solution($N, $A)
{
    $cond        = $N + 1;
    $currentMax  = 0;
    $lastUpdated = 0;
    $countArray  = array();
    $count       = count($A);

    for ($i = 0; $i < $count; $i++) {
        $current = $A[$i];
        if ($current == $cond) {
            $lastUpdated = $currentMax;
        } else {
            $pos = $current - 1;
            if (!isset($countArray[$pos])) {
                $countArray[$pos] = 0;
            }
            if ($countArray[$pos] < $lastUpdated) {
                $countArray[$pos] = $lastUpdated + 1;
            } else {
                $countArray[$pos]++;
            }
            if ($countArray[$pos] > $currentMax) {
                $currentMax = $countArray[$pos];
            }
        }
    }
    for ($i = 0; $i < $N; $i++) {
        if (!isset($countArray[$i])) {
            $countArray[$i] = 0;
        }
        if ($countArray[$i] < $lastUpdated) {
            $countArray[$i] = $lastUpdated;
        }
    }

    return $countArray;
}
