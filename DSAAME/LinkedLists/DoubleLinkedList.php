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
                $currentNode->setNextNode($newNode);

                // next node MIGHT be null... if we only have 1 node!
                if ($previouslyNextNode)
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
        if ($this->nodeOutOfBounds($nodePosition))
            throw new OutOfBoundsException("Requested position {$nodePosition}, but only have {$this->totalNodes} nodes.");

        $currentNode = $this->firstNode;
        $count       = 0;

        while ($currentNode) {
            if ($count == $nodePosition)
                return $currentNode->getData();

            $currentNode = $currentNode->getNextNode();
            $count++;
        }

        return null;
    }

    public function getAllNodes()
    {
        $array = [];
        $node  = $this->firstNode;

        while ($node) {
            $array[] = $node->getData();
            $node    = $node->getNextNode();
        }

        return $array;
    }

    public function deleteNode($nodePosition)
    {
        if ($this->nodeOutOfBounds($nodePosition))
            throw new OutOfBoundsException("Requested position {$nodePosition}, but only have {$this->totalNodes} nodes.");

        $currentNode = $this->firstNode;
        $count       = 0;

        while ($currentNode) {
            if ($count == $nodePosition - 1) {
                // The next node is the one to remove from list.
                $nodeToDelete    = $currentNode->getNextNode();
                $nodeAfterDelete = $nodeToDelete->getNextNode();

                $currentNode->setNextNode($nodeAfterDelete);
                $nodeAfterDelete->setPreviousNode($currentNode);
                $this->totalNodes--;

                return true;
            }

            $currentNode = $currentNode->getNextNode();
            $count++;
        }

        return false;
    }

    public function deleteLastNode()
    {
        // If we have 1 (or zero) nodes, easy peasy.
        if ($this->totalNodes <= 1)
            return $this->deleteAllNodes();

        $currentNode = $this->firstNode;

        while ($currentNode) {
            if ($currentNode->isNextToLastNode()) {
                $currentNode->setNextNode(null);
                $this->totalNodes--;
                break;
            }

            $currentNode = $currentNode->getNextNode();
        }
    }

    public function deleteFirstNode()
    {
        // Basically, just set the 2nd node in the list as $this->firstNode, and decrement our totalNodes count.
        if ($this->totalNodes <= 1)
            return $this->deleteAllNodes();

        $this->firstNode = $this->firstNode->getNextNode();
        $this->totalNodes--;

        return true;
    }

    public function deleteAllNodes()
    {
        $this->firstNode  = null;
        $this->lastNode   = null;
        $this->totalNodes = 0;

        return true;
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
