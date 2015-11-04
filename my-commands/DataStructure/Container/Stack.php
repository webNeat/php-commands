<?php namespace MyCommands\DataStructure\Container;


/**
 * Basic stack container
 */
class Stack {

    /**
     * Elements on the stack.
     * @var array
     */
    protected $elements;

    /**
     * Number of elements on the stack,
     * Using an attribute is more efficient than calling count().
     * 
     * @var int
     */
    protected $size;

    /**
     * Creates an empty stack.
     *
     * @return void
     */
    public function __construct()
    {
        $this->elements = [];
        $size = 0;
    }

    /**
     * Tells if the stack is empty.
     * @return boolean
     */
    public function isEmpty()
    {
        return ($this->size <= 0);
    }

    /**
     * Gives the number of elements on the stack.
     * @return int
     */
    public function count()
    {
        return $this->size;
    }

    /**
     * Pushes a new element on the stack.
     * @param  mixed $element
     * @return MyCommands\DataStructure\Container\Stack
     */
    public function push($element)
    {
        $this->elements[] = $element;
        $this->size ++;

        return $this;
    }

    /**
     * Gives the top element on the stack.
     * @return mixed
     */
    public function top()
    {
        if ($this->isEmpty()) {
            return null;
        }

        return $this->elements[$this->size - 1];
    }

    /**
     * Returns the top element on the stack after removing it.
     * @return mixed
     */
    public function pop()
    {
        if ($this->isEmpty()) {
            return null;
        }

        $this->size --;

        return array_pop($this->elements);
    }

}
