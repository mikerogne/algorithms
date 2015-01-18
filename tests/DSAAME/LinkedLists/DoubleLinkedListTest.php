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

    ///** @test */
    //public function can_insert_node()
    //{
    //    $this->list->addNode('first');
    //}
    //
    ///** @test */
    //public function can_get_total_nodes()
    //{
    //    $this->list->addNode('first');
    //
    //    $this->assertEquals(1, $this->list->getTotalNodes());
    //    $this->assertEquals(1, $this->list->getTotalNodes(), 'Total nodes should be 1.');
    //}
    //
    ///** @test */
    //public function can_add_node_to_beginning()
    //{
    //    $this->list->addNode('first');
    //    $this->list->addNodeToBeginning('real first');
    //
    //    $expected = 'real first';
    //    $actual = $this->list->getNode(0);
    //
    //    $this->assertEquals($expected, $actual);
    //    $this->assertEquals(2, $this->list->getTotalNodes(), 'Total nodes should be 2.');
    //}

    /** @test */
    public function can_add_node_after_first_node()
    {
        $this->list->addNode('first');
        $this->list->addNodeAfter(0, 'second');

        $expected = 'second';
        $actual = $this->list->getNode(1);

        $this->assertEquals($expected, $actual);
        $this->assertEquals(2, $this->list->getTotalNodes(), 'Total nodes should be 2.');
    }
}
