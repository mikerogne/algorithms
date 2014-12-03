<?php

while (1) {
    $startTime = microtime(true);
    $input = readline("Input (q to quit): ");
    if (userWantsToQuit($input)) {
        echo "Bye!\n";
        break;
    }
    $endTime = microtime(true);
    $diffTime = $endTime - $startTime;
    $diffTimeMilliseconds = $diffTime * 1000;

    echo "({$diffTimeMilliseconds} ms) You said: {$input}\n";
}


function userWantsToQuit($input)
{
    return in_array(strtolower($input), ['q', 'quit', 'exit']);
}
