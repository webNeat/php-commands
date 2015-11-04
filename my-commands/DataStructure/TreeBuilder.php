<?php namespace MyCommands\DataStructure;

use MyCommands\DataStructure\Container\Stack;
use MyCommands\DataStructure\Tree;


/**
 * Parses a string and builds a tree from it.
 */
class TreeBuilder {

    /**
     * A Closure that takes a string and 
     * makes the data to store into a node.
     * 
     * @var Closure
     */
    protected $dataMaker;

    /**
     * The indentation string.
     * 
     * @var string
     */
    protected $indentation;

    /**
     * The elements to add to the tree.
     * 
     * @var MyCommands\DataStructure\Container\Stack
     */
    protected $elements;

    /**
     * The built tree.
     * 
     * @var MyCommands\DataStructure\Tree 
     */
    protected $tree;

    public function __construct(\Closure $dataMaker, $indentation = "\t")
    {
        $this->dataMaker = $dataMaker;
        $this->indentation = $indentation;
        $this->elements = new Stack;
        $this->tree = new Tree;
    }
}
