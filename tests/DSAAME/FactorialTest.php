<?php

class FactorialTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function test_factorial_5()
    {
        $this->assertEquals(120, factorial(5));
    }

    /** @test */
    public function test_factorial_10()
    {
        $this->assertEquals(3628800, factorial(10));
    }

    /** @test */
    public function test_factorial_2()
    {
        $this->assertEquals(2, factorial(2));
    }
}
