<?php namespace Wn\IO\Parser;

use Exception;
use Wn\Exceptions\ParserException;
use Wn\IO\ParserInterface;


class Json implements ParserInterface {

    /**
     * Parses a string and returns the corresponding PHP object.
     * 
     * @param  string $encodedString
     * @return mixed
     */
    public static function parse($encodedString)
    {
        $object = simplexml_load_string($encodedString);
        
        if ($object === false) {
            throw new ParserException("Error while parsing XML");
        }

        return $object;
    }

    /**
     * Encodes an object and returns the corresponding string.
     * 
     * @param  mixed $encodedString
     * @return string
     */
    public static function dump($object)
    {
        $json = json_encode($data);

        if($json === false){
            throw new ParserException("Cannot encode the data to JSON");
        }

        return $json;
    }

}
