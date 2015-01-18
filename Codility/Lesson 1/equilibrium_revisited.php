<?php
/*
 * This results in an 100% score.
 */

function solution($A)
{
    $firstPart         = $A[0];
    $lastPart          = array_sum(array_slice($A, 1, count($A) - 1));
    $minimalDifference = abs($firstPart - $lastPart);

    for ($i = 1; $i < count($A) - 1; $i++) {
        $thisNumber = $A[$i];

        $firstPart = $firstPart + $thisNumber;
        $lastPart  = $lastPart - $thisNumber;

        $difference = abs($firstPart - $lastPart);

        if ($difference < $minimalDifference)
            $minimalDifference = $difference;
    }

    return $minimalDifference;
}
