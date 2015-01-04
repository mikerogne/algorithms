<?php

/**
 * Interface StackInterface
 */
interface StackInterface
{
    public function push($value);

    public function pop();

    public function peek();

    public function isEmpty();

    public function size();
}

/**
 * Class Stack
 */
class Stack implements StackInterface
{
    private $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    public function push($value)
    {
        array_push($this->stack, $value);
    }

    public function pop()
    {
        array_pop($this->stack);
    }

    public function peek()
    {
        if(! $this->isEmpty()) {
            $index = $this->getLastIndex();
            return $this->stack[$index];
        }
    }

    public function isEmpty()
    {
        return count($this->stack) == 0;
    }

    public function size()
    {
        return count($this->stack);
    }

    /**
     * @return int
     */
    private function getLastIndex()
    {
        return count($this->stack) - 1;
    }
}
