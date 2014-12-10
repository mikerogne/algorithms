<?php

// you can use print for debugging purposes, e.g.
// print "this is a debug message\n";

$A = array(2, 2, 1, 0, 1);

echo solution($A);

function solution($A)
{
    $N      = count($A);
    $occur  = array();
    $result = null;

    for ($i = 0; $i < $N; $i++) {
        $thisValue = $A[$i];

        echo "Checking {$thisValue}... ";
        if (!isset($occur[$thisValue])) {
            echo "NOT FOUND. Setting {$result} to {$i}.";
            $occur[$thisValue] = true;
            $result            = $i;
        }
        echo "\n";
    }

    return $result;
}
