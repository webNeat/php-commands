<?php namespace MyCommands\DataStructure;


class Node {

    protected $data;

    protected $parents;

    protected $childs;

    public function __construct($data)
    {
        $this->data = $data;
        $this->parents = [];
        $this->childs = [];
    }

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

    public function addParent(Node $parent)
    {
        $this->parents[] = $parent;

        return $this;
    }

    public function data()
    {
        return $this->data;
    }

    public function childs()
    { 
        return $this->childs;
    }

    public function parents()
    { 
        return $this->childs;
    }

}
