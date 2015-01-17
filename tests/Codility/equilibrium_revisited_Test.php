<?php

require(__DIR__ . '/../../Codility/Lesson 1/perm_missing_element_revisited.php');

class perm_missing_element_revisited_Test extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function test1()
    {
        $A = [2, 3, 1, 5];

        $this->assertEquals(4, solution($A));
    }

    /** @test */
    public function test2()
    {
        $A = [1, 2, 3, 4, 5, 6, 7, 9, 10];

        $this->assertEquals(8, solution($A));
    }

    /** @test */
    public function bigger_test()
    {
        $A = range(1, 90000);
        unset($A[count($A) - 2]);

        $this->assertSame(89999, solution($A));
    }

    /** @test */
    public function empty_test()
    {
        $this->assertEquals(1, solution([]));
    }

    /** @test */
    public function missing_first_element()
    {
        $A = [2, 3, 4, 5];
        $this->assertEquals(1, solution($A));
    }

    /** @test */
    public function missing_last_element()
    {
        $A = [1, 2, 3, 4];
        $this->assertEquals(5, solution($A));
    }
}
