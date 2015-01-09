<?php

class DecimalToBinaryTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function test_binary_1()
    {
        $this->assertEquals("1", decimalToBinary(1));
    }

    /** @test */
    public function test_binary_2()
    {
        $this->assertEquals("10", decimalToBinary(2));
    }

    /** @test */
    public function test_binary_5()
    {
        $this->assertEquals("101", decimalToBinary(5));
    }

    /** @test */
    public function test_binary_40()
    {
        $this->assertEquals("101000", decimalToBinary(40));
    }

    /** @test */
    public function test_binary_77()
    {
        $this->assertEquals("1001101", decimalToBinary(77));
    }
}
