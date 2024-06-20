<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    // Creating an empty array to store validation errors
    protected $errors = [];

    public function __construct(public array $attributes)
    {
       
        // Checking if the email is valid using the Validator class
        if (!Validator::email($attributes['email'])) {
            $this -> errors['email'] = 'Please provide a valid email address';
        }
    
        // Checking if the password is a string with a minimum length of 7 characters using the Validator class
        if (!Validator::string($attributes['password'])) {
            $this -> errors['password'] = 'Please provide a valid password.';
        }
    
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance -> failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this ->  errors(), $this -> attributes);

    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this -> errors;
    }

    public function error($field, $message)
    {
        $this -> errors[$field] = [$message];

        return $this;
    }

}
