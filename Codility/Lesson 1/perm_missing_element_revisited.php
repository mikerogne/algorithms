<?php

/*
 * This results in a score of 100%.
 */

function solution($A)
{
    if (!is_array($A))
        return 1;

    sort($A);

    if (empty($A) || $A[0] != 1)
        return 1;

    $lastElement = $A[count($A) - 1];
    if ($lastElement != count($A) + 1) {
        return count($A) + 1;
    }

    $total = count($A);
    for ($i = 0; $i < $total; $i++) {
        $thisElement  = $A[$i];
        $nextElement  = isset($A[$i + 1]) ? $A[$i + 1] : null;
        $nextExpected = $thisElement + 1;

        if ($nextElement) {
            if ($nextElement != $nextExpected)
                return $nextExpected;
        }
    }
}
