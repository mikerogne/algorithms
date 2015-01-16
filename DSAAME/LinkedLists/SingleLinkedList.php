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

        $currentNode = $this->firstNode;
        $count       = 0;

        while ($currentNode) {
            if ($count == $nodePosition) {
                // Take what would have been the next node, and make it the NEW NODE's next node.
                $previouslyNextNode = $currentNode->getNextNode();
                $newNode            = new SingleLinkedListNode($data);
                $newNode->setNextNode($previouslyNextNode);

                // Insert new node right after this one, making it become "inserted" after.
                $currentNode->setNextNode($newNode);
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
            throw new \Exception("Out of bounds.");

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

    /**
     * @return array
     */
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
            throw new \Exception("Out of bounds.");

        $currentNode = $this->firstNode;
        $count       = 0;

        while ($currentNode) {
            if ($count == $nodePosition - 1) {
                // The next node is the one to remove from list.
                $nodeToDelete = $currentNode->getNextNode();
                $currentNode->setNextNode($nodeToDelete->getNextNode());
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

    public function reverseList()
    {
        $previousNode = null;
        $currentNode  = $this->firstNode;

        while ($currentNode) {
            $nextNode = $currentNode->getNextNode();

            $currentNode->setNextNode($previousNode);

            // Move to the next node in the list.
            $previousNode = $currentNode;
            $currentNode  = $nextNode;
        }

        // At the end of this loop, $nextNode will be null, and $previousNode will be the new head.
        $this->firstNode = $previousNode;
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
