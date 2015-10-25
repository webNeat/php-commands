<?php namespace MyCommands\DataStructure;


class TreeBuilder {

    protected $dataBuilder;

    protected $indentation;

    public function __construct(\Closure $dataBuilder, $indentation = "\t")
    {
        $this->dataBuilder = $dataBuilder;
        $this->indentation = $indentation;
    }
}
