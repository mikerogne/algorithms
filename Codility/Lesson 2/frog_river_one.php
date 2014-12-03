<?php

// Find the earliest time when a frog can jump to the other side of a river.

$X = 5;
$A = array(1, 3, 1, 4, 2, 3, 5, 4);
echo solution($X, $A);


function solution($X, $A)
{
    $steps = $X;
    $bitmap = array();

    for($i = 0; $i < count($A); $i++) {
        if(! isset($bitmap[$A[$i]])) {
            $steps--;
            $bitmap[$A[$i]] = true;
        }

        if($steps == 0) return $i;
    }

    return -1;
}

function solution_other($X, $A)
{
    $tiles = array();

    // Loop through the entire array $A.
    for ($i = 0; $i < count($A); $i++) {

        // $j is equal to $A[0]-1, $A[1]-1, $A[2]-1, ... , $A[n]-1
        $j = $A[$i] - 1;

        // If $tiles[$j] isn't set, decrement $X.
        // Then set $tiles[$j] to true.
        // WHY?
        if (!isset($tiles[$j])) {
            $X--;
            $tiles[$j] = true;
        }

        // If $X is decremented all the way to 0, return $i.
        // WHY?
        if (!$X) {
            return $i;
        }
    }

    return -1;
}

function solution_mike($X, $A)
{
    // If never able to jump to the other side of the river, return -1.
    // Given the data above, this function should return 6.
    // 6 is the array index where the value is 5.

    $search = array_search($X, $A);

    return $search === false ? -1 : $search;
}
