<?php

function solution($X, $Y, $D)
{
    $distanceRemaining = $Y - $X;

    if($distanceRemaining <= 0)
        return 0;

    return (int)ceil($distanceRemaining / $D);
}
