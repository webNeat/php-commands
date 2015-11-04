<?php namespace MyCommands\DataStructure;


/**
 * A generic graph node.
 */
class Node {

    /**
     * The data into the node
     * @var mixed
     */
    protected $data;

    /**
     * The parents or predecessor nodes.
     * @var array
     */
    protected $parents;

    /**
     * The childrens or successor nodes.
     * @var array
     */
    protected $childs;

    /**
     * Creates a new node with the given data
     * @param mixed $data
     * @return void
     */
    public function __construct($data = null)
    {
        $this->data = $data;
        $this->parents = [];
        $this->childs = [];
    }

    /**
     * Adds a new children optionaly on a specific key.
     * @param Node    $child
     * @param mixed   $key
     * @return MyCommands\DataStructure\Node
     */
    public function addChild(Node $child, $key = false)
    {
        $child->addParent($this);
        if($key){
            $this->childs[$key] = $child;
        } else {
            $this->childs[] = $child;
        }

        return $this;
    }

    /**
     * Adds a parent node.
     * @param Node $parent
     * @return MyCommands\DataStructure\Node
     */
    public function addParent(Node $parent)
    {
        $this->parents[] = $parent;

        return $this;
    }

    /**
     * Data getter.
     * @return mixed
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * Childrens getter.
     * @return array
     */
    public function childs()
    { 
        return $this->childs;
    }

    /**
     * Parents getter.
     * @return array
     */
    public function parents()
    { 
        return $this->childs;
    }

}
