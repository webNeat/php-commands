<?php namespace MyCommands\DataStructure;

use MyCommands\DataStructure\Node;
use MyCommands\Exception\DataStructureException;


/**
 * A Tree is a node without multiple parents.
 */
class Tree extends Node {

    /**
     * Set the parent node.
     * @param Tree $parent
     * @throws MyCommands\Exception\DataStructureException 
     *         if already having a parent node.
     * @return MyCommands\DataStructure\Tree
     */
    public function addParent(Tree $parent)
    {
        if(! empty($this->parents))
            throw new DataStructureException('A tree node cannot have more then one parent node');
        
        return parent::addParent($parent);
    }

    /**
     * Gets the parent.
     * @return MyCommands\DataStructure\Tree
     */
    public function parent()
    {
        return (! empty($this->parents)) ? $this->parents[0] : null;
    }
    
}
