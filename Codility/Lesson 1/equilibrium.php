<?php

echo solution([3,1,2,4,3]);

function solution($A)
{
    $totalElements = count($A);
    $firstPart = $A[0];
    $secondPart = array_sum(array_slice($A, 1));
    $currentMinimalDifference = abs($firstPart - $secondPart);

    for($index = 1; $index < $totalElements-1; $index++) {
        $firstPart += $A[$index];
        $secondPart -= $A[$index];
        $difference = abs($firstPart - $secondPart);

        if($difference < $currentMinimalDifference)
            $currentMinimalDifference = $difference;
    }

    return $currentMinimalDifference;
}
