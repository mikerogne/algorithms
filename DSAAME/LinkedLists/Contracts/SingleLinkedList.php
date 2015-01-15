<?php namespace DSAAME\LinkedLists\Contracts;

interface SingleLinkedList
{
    public function getTotalNodes();

    public function addNode($data);

    public function addNodeToBeginning($data);

    public function addNodeAfter($data, $nodePosition);

    public function getNode($nodePosition);

    public function getAllNodes();

    public function deleteNode($nodePosition);

    public function deleteLastNode();

    public function deleteFirstNode();

    public function deleteAllNodes();

    public function reverseList();
}
