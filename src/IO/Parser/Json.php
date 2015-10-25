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
        $object = json_decode($encodedString);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new ParserException("Error while parsing JSON");
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
