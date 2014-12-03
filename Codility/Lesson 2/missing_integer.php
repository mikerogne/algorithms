<?php

$A = array(-5, -4, -3, -2, -1, 1, 3, 6, 4, 1, 2);
$A = array(1, 3, 6, 4, 1, 2);
$A = array(1);
$A = array(-5,-4,-3,-2,-1);

echo solution($A);

function solution($A)
{
    sort($A);
    $checked = array();

    for ($i = 0; $i < count($A); $i++) {
        if ($A[$i] < 0) continue;

        $thisValue = $A[$i];

        if (!isset($checked[$thisValue])) {
            // Does the value BEFORE this one exist?
            $previousValue = $thisValue - 1;

            if ($previousValue > 0 && !isset($checked[$previousValue])) {
                return $previousValue;
            }

            $checked[$thisValue] = true;
        }
    }

    return $A[count($A)-1]+1 == 0 ? 1 : $A[count($A)-1]+1;
}
