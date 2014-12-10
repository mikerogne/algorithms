<?php

$primes = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];
$result = doSearch($primes, 73);

echo "Result: $result\n";

function doSearch(array $array, $targetValue)
{
    $min = 0;
    $max = count($array);
    $guess = null;

    while(true) {
        if($max < $min) { return -1; } // target not found
        $guess = floor(($max+$min)/2);

        if($array[$guess] == $targetValue) { return $guess; }

        if($array[$guess] < $targetValue) {
            // too low
            $min = $guess+1;
        }

        if($array[$guess] > $targetValue) {
            // too high
            $max = $guess-1;
        }
    }
}


/*
/* Returns either the index of the location in the array,
  or -1 if the array did not contain the targetValue * /
var doSearch = function(array, targetValue) {
    var min = 0;
    var max = array.length - 1;
    var guess;

    while(true) {
        guess = Math.floor((max+min)/2);
        // println(array[guess]);

        if(array[guess] === targetValue) {
            return guess;
        }

        if(array[guess] > targetValue) {
            // println("Too high");
            max = guess - 1;
        }

        if(array[guess] < targetValue) {
            // println("Too low");
            min = guess + 1;
        }

        // println("max="+max+" AND min="+min);

        if(max < min) {
            return -1;
        }
    }

    return -1;
};

var primes = [2,  3,  5,  7,  11, 13, 17, 19, 23, 29, 31, 37,
              41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];

var result = doSearch(primes, 73);
println("Found prime at index " + result);

Program.assertEqual(doSearch(primes, 73), 20);
 */
