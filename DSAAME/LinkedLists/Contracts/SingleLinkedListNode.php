<?php namespace DSAAME\LinkedLists\Contracts;

interface SingleLinkedListNode
{
    public function setData($data);

    public function getData();

    public function setNextNode($nextNode);

    public function getNextNode();
}
