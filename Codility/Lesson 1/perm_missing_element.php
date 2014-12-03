<?php

echo solution(array(2,3,1,5));

function solution($A)
{
    $array = $A;
    sort($array);

    if(empty($A) || count($A) == 1) return 0;
    if(count($A) == 2) {
        return $A[0]+1;
    }

    $lastIndex = count($array) - 1;
    $currentNumber = $array[0];

    for($i = 1; $i <= $lastIndex; $i++) {
        if(++$currentNumber != $array[$i]) {
            return $currentNumber;
        }
    }
}
