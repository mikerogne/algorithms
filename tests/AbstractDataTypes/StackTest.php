<?php

use AbstractDataTypes\Stack;

class StackTest extends PHPUnit_Framework_TestCase
{
    private $stack;

    public function setUp()
    {
        parent::setUp();

        $this->stack = new Stack();
    }

    /** @test */
    public function can_create_stack()
    {
        $this->assertInstanceOf(Stack::class, $this->stack);
    }

    /** @test */
    public function can_push_and_pop()
    {
        $this->stack->push('foo');
        $lastValue = $this->stack->pop();

        $this->assertEquals('foo', $lastValue);
    }

    /** @test */
    public function can_push_3_times_and_get_count()
    {
        $this->stack->push('foo');
        $this->stack->push('bar');
        $this->stack->push('baz');

        $this->assertEquals(3, $this->stack->size());
    }

    /**
     * @test
     * @expectedException Exception
     * @expectedExceptionMessage Stack is empty.
     */
    public function cannot_pop_empty_stack()
    {
        $this->stack->pop();
    }

    /** @test */
    public function peek_doesnt_remove_last_element()
    {
        $this->stack->push('foo');
        $this->stack->push('bar');
        $peekedValue = $this->stack->peek();
        $poppedValue = $this->stack->pop();

        $this->assertSame($peekedValue, $poppedValue, "\$peekedValue and \$poppedValue should be same.");
    }
}
