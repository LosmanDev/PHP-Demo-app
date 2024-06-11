<?php

namespace Core; // Defines the namespace for the class

class Container // Defines the Container class
{
    protected $bindings = []; // Initializes an empty array to store bindings

    public function bind($key, $resolver) // Binds a key to a resolver function
    {
        $this->bindings[$key] = $resolver; // Stores the resolver function in the bindings array
    }
    
    public function resolve($key) // Resolves a key by calling its associated resolver function
    {
        if (!array_key_exists($key, $this->bindings)) { // Checks if the key exists in the bindings array
            throw new \Exception("No matching binding found for {$key}"); // Throws an exception if no matching binding is found
        }
    
        $resolver = $this->bindings[$key]; // Retrieves the resolver function for the key

        return call_user_func($resolver); // Calls the resolver function and returns its result
    }
}
