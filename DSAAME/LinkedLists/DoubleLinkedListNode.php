<?php namespace DSAAME\LinkedLists;

class DoubleLinkedListNode implements Contracts\DoubleLinkedListNode
{
    protected $data;
    protected $previousNode;
    protected $nextNode;

    public function __construct($data = null)
    {
        $this->data         = $data;
        $this->previousNode = null;
        $this->nextNode     = null;
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

    /**
     * @return DoubleLinkedListNode
     */
    public function getNextNode()
    {
        return $this->nextNode;
    }

    public function setPreviousNode($previousNode)
    {
        $this->previousNode = $previousNode;
    }

    /**
     * @return DoubleLinkedListNode
     */
    public function getPreviousNode()
    {
        return $this->previousNode;
    }
}
