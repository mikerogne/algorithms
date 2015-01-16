<?php

use DSAAME\LinkedLists\SingleLinkedList;

class SingleLinkedListTest extends PHPUnit_Framework_TestCase
{
    private $list;

    public function setUp()
    {
        $this->list = new SingleLinkedList();

        $this->list->addNode("first");
        $this->list->addNode("second");
        $this->list->addNode("third");
    }

    /** @test */
    public function has_three_nodes()
    {
        $this->assertEquals(3, $this->list->getTotalNodes());
    }

    /** @test */
    public function can_delete_last_node()
    {
        $this->list->deleteLastNode();

        $this->assertSame(['first','second'], $this->list->getAllNodes());
    }

    /** @test */
    public function can_delete_all_nodes()
    {
        $this->list->deleteAllNodes();

        $this->assertSame([], $this->list->getAllNodes());
    }

    /** @test */
    public function can_delete_first_node()
    {
        $this->list->deleteFirstNode();

        $this->assertSame(['second', 'third'], $this->list->getAllNodes());
    }

    /** @test */
    public function can_add_node_to_beginning()
    {
        $this->list->addNodeToBeginning('new starter node!');

        $expectedArray = ['new starter node!', 'first', 'second', 'third'];
        $actualArray = $this->list->getAllNodes();

        $this->assertSame($expectedArray, $actualArray);
    }

    /** @test */
    public function can_add_node_after_first_node()
    {
        $this->list->addNodeAfter(0, "new node");

        $expectedArray = ['first', 'new node', 'second', 'third'];
        $actualArray = $this->list->getAllNodes();

        $this->assertSame($expectedArray, $actualArray);
    }

    /** @test */
    public function can_add_node_after_second_node()
    {
        $this->list->addNodeAfter(1, "new node");

        $expectedArray = ['first', 'second', 'new node', 'third'];
        $actualArray = $this->list->getAllNodes();

        $this->assertSame($expectedArray, $actualArray);
    }

    /**
     * @test
     * @expectedException \Exception
     * @expectedExceptionMessage Out of bounds.
     */
    public function throws_out_of_bounds_exception()
    {
        $this->list->addNodeAfter(100, "new node");
    }

    /** @test */
    public function can_get_second_node()
    {
        $expected = 'second';
        $actual = $this->list->getNode(1);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_get_third_node()
    {
        $expected = 'third';
        $actual = $this->list->getNode(2);

        $this->assertEquals($expected, $actual);
    }
}
