<?php namespace DSAAME\LinkedLists;


class SingleLinkedList implements Contracts\SingleLinkedList
{
    /**
     * @var int
     */
    protected $totalNodes;

    /**
     * @var SingleLinkedListNode $firstNode
     */
    protected $firstNode;

    /**
     * @var SingleLinkedListNode $lastNode
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
        $newNode = new SingleLinkedListNode($data);

        /*
         * If we don't have any nodes yet, then let's start by setting
         * both $this->firstNode and $this->lastNode to $newNode.
         */
        if (!$this->haveNodes()) {
            $this->firstNode = $newNode;
            $this->lastNode  = $newNode;
        } else {
            $previouslyLastNode = $this->lastNode;
            $this->lastNode     = $newNode;

            /*
             * The previously last node is now next-to-last.
             * Update its pointer to the next node.
             */
            $previouslyLastNode->setNextNode($newNode);
        }

        $this->totalNodes++;
    }

    public function addNodeToBeginning($data)
    {
        $newNode = new SingleLinkedListNode($data);
        $newNode->setNextNode($this->firstNode);
        $this->firstNode = $newNode;
        $this->totalNodes++;
    }

    public function addNodeAfter($nodePosition, $data)
    {
        if ($this->nodeOutOfBounds($nodePosition))
            throw new \Exception("Out of bounds.");

        $newNode     = new SingleLinkedListNode($data);
        $currentNode = $this->firstNode;
        $count       = 0;

        while ($currentNode) {
            if ($count == $nodePosition) {
                // Take what would have been the next node, and make it the NEW NODE's next node.
                $previouslyNextNode = $currentNode->getNextNode();
                $newNode->setNextNode($previouslyNextNode);

                // Insert new node right after this one, making it become "inserted" after.
                $currentNode->setNextNode($newNode);
                $this->totalNodes++;
            }

            $currentNode = $currentNode->getNextNode();
            $count++;
        }
    }

    public function getNode($nodePosition)
    {
        // todo
    }

    public function getAllNodes()
    {
        /*
         * Something along the lines of:
         * Get the first node "A" ($this->firstNode).
         * Keep looping through $node->getNextNode() until it returns null (recursive).
         * Build the array from those results.
         * Return array.
         */
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
        // todo
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

    public function reverseList()
    {
        // todo - not in any hurry to get this one done. get basics working first.
    }

    /**
     * @return bool
     */
    protected function haveNodes()
    {
        return $this->totalNodes > 0;
    }

    /**
     * @param $nodePosition
     * @return bool
     */
    protected function nodeOutOfBounds($nodePosition)
    {
        return $nodePosition > $this->totalNodes - 1;
    }
}
