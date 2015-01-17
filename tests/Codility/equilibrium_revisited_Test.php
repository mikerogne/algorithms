<?php

require(__DIR__ . '/../../Codility/Lesson 1/equilibrium_revisited.php');

class equilibrium_revisited_Test extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function test1()
    {
        $A = [3,1,2,4,3];

        $this->assertEquals(1, solution($A));
    }
}
