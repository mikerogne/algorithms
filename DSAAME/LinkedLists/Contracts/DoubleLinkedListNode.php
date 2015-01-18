<?php namespace DSAAME\LinkedLists\Contracts;

interface DoubleLinkedListNode
{
    public function setData($data);

    public function getData();

    public function setNextNode($nextNode);

    public function getNextNode();

    public function setPreviousNode($previousNode);

    public function getPreviousNode();
}
