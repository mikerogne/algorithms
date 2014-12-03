<?php

echo solution($A);

function solution($A)
{
    sort($A);
    $firstValue = $A[0];

    for ($i = 0; $i < count($A); $i++) {
        if($A[$i] - $firstValue != $i)
            return 0;
    }

    return 1;
}
