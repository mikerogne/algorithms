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

    }

    public function addNodeAfter($data, $nodePosition)
    {

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
        // todo - not sure.. traverse list until I reach $this->count-1? Will require some thought.
    }

    public function deleteFirstNode()
    {
        // todo
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
}
