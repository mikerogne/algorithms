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

        $this->assertSame(['first', 'second'], $this->list->getAllNodes());
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
        $actualArray   = $this->list->getAllNodes();

        $this->assertSame($expectedArray, $actualArray);
    }

    /** @test */
    public function can_add_node_after_first_node()
    {
        $this->list->addNodeAfter(0, "new node");

        $expectedArray = ['first', 'new node', 'second', 'third'];
        $actualArray   = $this->list->getAllNodes();

        $this->assertSame($expectedArray, $actualArray);
    }

    /** @test */
    public function can_add_node_after_second_node()
    {
        $this->list->addNodeAfter(1, "new node");

        $expectedArray = ['first', 'second', 'new node', 'third'];
        $actualArray   = $this->list->getAllNodes();

        $this->assertSame($expectedArray, $actualArray);
    }

    /**
     * @test
     * @expectedException \OutOfBoundsException
     */
    public function throws_out_of_bounds_exception()
    {
        $this->list->addNodeAfter(100, "new node");
    }

    /** @test */
    public function can_get_second_node()
    {
        $expected = 'second';
        $actual   = $this->list->getNode(1);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_get_third_node()
    {
        $expected = 'third';
        $actual   = $this->list->getNode(2);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_delete_second_node()
    {
        $this->list->deleteNode(1);

        $expected = ['first', 'third'];
        $actual   = $this->list->getAllNodes();

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function count_is_correct_after_adding_node_to_beginning()
    {
        $this->list->addNodeToBeginning('new node');

        $expected = 4;
        $actual   = $this->list->getTotalNodes();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function count_is_correct_after_adding_node_to_end()
    {
        $this->list->addNode('new node');

        $expected = 4;
        $actual   = $this->list->getTotalNodes();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function count_is_correct_after_adding_node_in_middle()
    {
        $this->list->addNodeAfter(1, 'new node');

        $expected = 4;
        $actual   = $this->list->getTotalNodes();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function count_is_correct_after_removing_node_from_beginning()
    {
        $this->list->deleteFirstNode();

        $expected = 2;
        $actual   = $this->list->getTotalNodes();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function count_is_correct_after_removing_node_from_end()
    {
        $this->list->deleteLastNode();

        $expected = 2;
        $actual   = $this->list->getTotalNodes();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function count_is_correct_after_removing_node_from_middle()
    {
        $this->list->deleteNode(1);

        $expected = 2;
        $actual   = $this->list->getTotalNodes();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function count_is_correct_when_deleting_all_nodes()
    {
        $this->list->deleteAllNodes();

        $expected = 0;
        $actual   = $this->list->getTotalNodes();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function reversing_list_is_correct()
    {
        $this->list->reverseList();

        $expected = ['third', 'second', 'first'];
        $actual   = $this->list->getAllNodes();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function count_is_correct_when_reversing_list()
    {
        $this->list->reverseList();

        $expected = 3;
        $actual   = $this->list->getTotalNodes();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function reversing_list_is_correct_when_adding_node()
    {
        $this->list->addNodeAfter(1, "new node");
        $this->list->reverseList();

        $expected = ["third", "new node", "second", "first"];
        $actual   = $this->list->getAllNodes();

        $message = "Expected: " . print_r($expected, true) . "\n\nActual: " . print_r($actual, true);
        $this->assertEquals($expected, $actual, $message);
    }

    /** @test */
    public function reversing_list_is_correct_when_removing_node()
    {
        $this->list->deleteNode(1);
        $this->list->reverseList();

        $expected = ["third", "first"];
        $actual   = $this->list->getAllNodes();

        $this->assertEquals($expected, $actual);
    }
}
