<?php
namespace Wn\IO;


interface ParserInterface {
    
    /**
     * Parses a string and returns the corresponding PHP object.
     * 
     * @param  string $encodedString
     * @return mixed
     */
    public static function parse($encodedString);

    /**
     * Encodes an object and returns the corresponding string.
     * 
     * @param  mixed $encodedString
     * @return string
     */
    public static function dump($object);

}
