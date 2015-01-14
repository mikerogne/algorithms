<?php namespace DSAAME\LinkedLists\Contracts;

interface SingleLinkedList
{
    public function getTotalNodes();

    public function addNode();

    public function addNodeToBeginning();

    public function getNode($nodePosition);

    public function getAllNodes();

    public function deleteNode($nodePosition);

    public function deleteLastNode();

    public function deleteFirstNode();

    public function reverseList();
}
