<?php namespace Wn;


class Vars {

    protected static $data = [];

    public static function set($key, $value)
    {
        static::$data[$key] = $value;
    }

    public static function has($key)
    {
        return array_key_exists($key, static::$data);
    }

    public static function get($key)
    {
        if(static::has($key))
            return static::$data[$key];
        return null;
    }

}
