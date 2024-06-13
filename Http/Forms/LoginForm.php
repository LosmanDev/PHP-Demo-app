<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    // Creating an empty array to store validation errors
    protected $errors = [];

    public function validate($email, $password)
    {
        // Checking if the email is valid using the Validator class
        if (!Validator::email($email)) {
            $this -> errors['email'] = 'Please provide a valid email address';
        }

        // Checking if the password is a string with a minimum length of 7 characters using the Validator class
        if (!Validator::string($password)) {
            $this -> errors['password'] = 'Please provide a valid password.';
        }

        return empty($this -> errors);
    }

    public function errors()
    {
        return $this -> errors;
    }

    public function error($field, $message)
    {
        $this -> errors[$field] = [$message];
    }

}
