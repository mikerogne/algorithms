<?php

echo solution(10, 85, 30);

/**
 * @param int $X current position
 * @param int $Y target position
 * @param int $D distance per jump
 */
function solution($X, $Y, $D)
{
    $currentPosition = $X;
    $targetPosition = $Y;
    $distancePerJump = $D;

    // Calculate the total distance needed to move in order to reach target position.
    $distanceRequired = $targetPosition - $currentPosition;

    return (int)ceil($distanceRequired / $distancePerJump);
}
