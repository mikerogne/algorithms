<?php namespace DSAAME\LinkedLists;

class SingleLinkedListNode implements Contracts\SingleLinkedListNode
{
    protected $data;
    protected $nextNode;

    public function __construct($data)
    {
        $this->data     = $data;
        $this->nextNode = null;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setNextNode($nextNode)
    {
        $this->nextNode = $nextNode;
    }

    public function getNextNode()
    {
        return $this->nextNode;
    }
}
