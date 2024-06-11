<?php

namespace Core; // Defines the namespace for the class

class App // Defines the App class
{
    protected static $container; // Declares a protected static property called $container

    public static function setContainer($container) // Defines a public static method called setContainer that takes a parameter $container
    {
        static::$container = $container; // Assigns the value of $container to the static property $container
    }

    public static function container() // Defines a public static method called container
    {
        return static::$container; // Returns the value of the static property $container
    }

    public static function bind($key, $resolver) // Defines a public static method called bind that takes two parameters $key and $resolver
    {
        static::container()->resolve($key, $resolver); // Calls the resolve method on the container and passes $key and $resolver as arguments
    }

    public static function resolve($key) // Defines a public static method called resolve that takes a parameter $key
    {
        return static::container()->resolve($key); // Calls the resolve method on the container and passes $key as an argument, and returns the result
    }
}
