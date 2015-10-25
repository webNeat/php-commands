<?php namespace MyCommands\DataStructure;

use MyCommands\DataStructure\Node;


class TreeNode extends Node {

    public function addParent(Node $parent)
    {
        if(! empty($this->parents))
            throw new DataStructureException('A tree node cannot have more then one parent node');
        
        return parent::addParent($parent);
    }
    
}
