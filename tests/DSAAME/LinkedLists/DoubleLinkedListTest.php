<?php

use DSAAME\LinkedLists\DoubleLinkedList;

class DoubleLinkedListTest extends PHPUnit_Framework_TestCase
{
    private $list;

    public function setUp()
    {
        parent::setUp();

        $this->list = new DoubleLinkedList;
    }

    /** @test */
    public function can_insert_node()
    {
        $this->list->addNode('first');
    }

    /** @test */
    public function can_get_total_nodes()
    {
        $this->list->addNode('first');

        $this->assertEquals(1, $this->list->getTotalNodes());
        $this->assertEquals(1, $this->list->getTotalNodes(), 'Total nodes should be 1.');
    }

    /** @test */
    public function can_add_node_to_beginning()
    {
        $this->list->addNode('first');
        $this->list->addNodeToBeginning('real first');

        $expected = 'real first';
        $actual   = $this->list->getNode(0);

        $this->assertEquals($expected, $actual);
        $this->assertEquals(2, $this->list->getTotalNodes(), 'Total nodes should be 2.');
    }

    /** @test */
    public function can_add_node_after_first_node()
    {
        $this->list->addNode('first');
        $this->list->addNodeAfter(0, 'second');

        $expected = 'second';
        $actual   = $this->list->getNode(1);

        $this->assertEquals($expected, $actual);
        $this->assertEquals(2, $this->list->getTotalNodes(), 'Total nodes should be 2.');
    }

    /** @test */
    public function can_get_all_nodes_as_array()
    {
        $this->addThreeNodes();

        $expected = ['first', 'second', 'third'];
        $actual   = $this->list->getAllNodes();

        $this->assertEquals($expected, $actual);
        $this->assertEquals(3, $this->list->getTotalNodes(), 'Total nodes should be 3.');
    }

    /** @test */
    public function can_delete_first_node()
    {
        $this->addThreeNodes();
        $this->list->deleteFirstNode();

        $expected = ['second', 'third'];
        $actual = $this->list->getAllNodes();

        $this->assertEquals($expected, $actual);
        $this->assertEquals(2, $this->list->getTotalNodes(), 'Total nodes should be 2.');
    }

    /** @test */
    public function can_delete_middle_node()
    {
        $this->addThreeNodes();
        $this->list->deleteNode(1);

        $expected = ['first', 'third'];
        $actual = $this->list->getAllNodes();

        $this->assertEquals($expected, $actual);
        $this->assertEquals(2, $this->list->getTotalNodes(), 'Total nodes should be 2.');
    }

    /** @test */
    public function can_delete_last_node()
    {
        $this->addThreeNodes();
        $this->list->deleteLastNode();

        $expected = ['first', 'second'];
        $actual = $this->list->getAllNodes();

        $this->assertEquals($expected, $actual);
        $this->assertEquals(2, $this->list->getTotalNodes(), 'Total nodes should be 2.');
    }

    /** @test */
    public function can_delete_all_nodes()
    {
        $this->addThreeNodes();
        $this->list->deleteAllNodes();

        $expected = [];
        $actual = $this->list->getAllNodes();

        $this->assertEquals($expected, $actual);
        $this->assertEquals(0, $this->list->getTotalNodes(), 'Total nodes should be 0.');
    }

    private function addThreeNodes()
    {
        $this->list->addNode('first');
        $this->list->addNode('second');
        $this->list->addNode('third');
    }
}
