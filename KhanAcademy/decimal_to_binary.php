<?php

var_dump(decimalToBinary(1));
var_dump(decimalToBinary(2));
var_dump(decimalToBinary(3));

function decimalToBinary($integer)
{
    if($integer < 0)
        throw new Exception("Integer must be >= 0.");

    // Determine maximum power of 2 that will meet or exceed $integer.
    $highestPower = null;
    for ($i = 0; $i < 100; $i++) {
        if (pow(2, $i) >= $integer) {
            $highestPower = $i;
            break;
        }
    }

    if ($highestPower === null)
        throw new Exception("Integer too high.");

    $remainder   = $integer;
    $binaryArray = [];
    for ($i = $highestPower; $i >= 0; $i--) {
        // See if pow(2, $i) will go into $remainder.
        // If it will, push 1. Otherwise push 0.
        $pow = pow(2, $i);

        if ($remainder / $pow >= 1) {
            $binaryArray[] = 1;
            $remainder -= $pow;
        } else {
            $binaryArray[] = 0;
        }
    }

    return join("", $binaryArray);
}
