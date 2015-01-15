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

    /**
     * @return null|SingleLinkedListNode
     */
    public function getNextNode()
    {
        return $this->nextNode;
    }

    /**
     * @return bool
     */
    public function isNextToLastNode()
    {
        $nextNode = $this->getNextNode();

        if (!$nextNode)
            return false;

        return $nextNode->getNextNode() === null;
    }
}
