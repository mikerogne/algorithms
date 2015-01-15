<?php namespace DSAAME\LinkedLists\Contracts;

interface SingleLinkedListNode
{
    public function setData($data);

    public function getData();

    public function setNextNode($nextNode);

    /**
     * @return null|SingleLinkedListNode
     */
    public function getNextNode();

    /**
     * @return bool
     */
    public function isNextToLastNode();
}
