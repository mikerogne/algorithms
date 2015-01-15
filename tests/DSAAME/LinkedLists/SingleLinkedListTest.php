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

        $correctArray = ['new starter node!', 'first', 'second', 'third'];
        $actualArray = $this->list->getAllNodes();

        $this->assertSame($correctArray, $actualArray);
    }
}
