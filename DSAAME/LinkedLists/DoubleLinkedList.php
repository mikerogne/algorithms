<?php namespace DSAAME\LinkedLists;

use OutOfBoundsException;

class DoubleLinkedList implements Contracts\DoubleLinkedList
{
    /**
     * @var int
     */
    protected $totalNodes;

    /**
     * @var DoubleLinkedListNode $firstNode
     */
    protected $firstNode;

    /**
     * @var DoubleLinkedListNode
     */
    protected $lastNode;

    public function __construct()
    {
        $this->totalNodes = 0;
        $this->firstNode  = null;
        $this->lastNode   = null;
    }

    public function getTotalNodes()
    {
        return $this->totalNodes;
    }

    public function addNode($data)
    {
        $newNode = new DoubleLinkedListNode($data);

        if (!$this->haveNodes()) {
            $this->firstNode = $newNode;
            $this->lastNode  = $newNode;
        } else {
            $previouslyLastNode = $this->lastNode;
            $this->lastNode     = $newNode;
            $newNode->setPreviousNode($previouslyLastNode);

            $previouslyLastNode->setNextNode($newNode);
        }

        $this->totalNodes++;
    }

    public function addNodeToBeginning($data)
    {
        $newNode = new DoubleLinkedListNode($data);
        $newNode->setNextNode($this->firstNode);
        $previouslyFirstNode = $this->firstNode;
        $previouslyFirstNode->setPreviousNode($newNode);
        $this->firstNode = $newNode;
        $this->totalNodes++;
    }

    public function addNodeAfter($nodePosition, $data)
    {
        if ($this->nodeOutOfBounds($nodePosition))
            throw new OutOfBoundsException("Requested position {$nodePosition}, but only have {$this->totalNodes} nodes.");

        $currentNode = $this->firstNode;
        $count       = 0;

        while ($currentNode) {
            if ($count == $nodePosition) {
                $previouslyNextNode = $currentNode->getNextNode();
                $newNode            = new DoubleLinkedListNode($data);
                $newNode->setNextNode($previouslyNextNode);
                $newNode->setPreviousNode($currentNode);
                $previouslyNextNode->setPreviousNode($newNode);
                $this->totalNodes++;

                break;
            }

            $currentNode = $currentNode->getNextNode();
            $count++;
        }
    }

    public function getNode($nodePosition)
    {
        return 'real first';
    }

    public function getAllNodes()
    {

    }

    public function deleteNode($nodePosition)
    {

    }

    public function deleteLastNode()
    {

    }

    public function deleteFirstNode()
    {

    }

    public function deleteAllNodes()
    {

    }

    protected function haveNodes()
    {
        return $this->totalNodes > 0;
    }

    protected function nodeOutOfBounds($nodePosition)
    {
        return $nodePosition > $this->totalNodes - 1;
    }
}
