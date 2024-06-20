<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    // Getting the value of the 'email' field from the form submission
    'email' => $_POST['email'],

    // Getting the value of the 'password' field from the form submission
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

// If not found, return the 'sessions/create.view.php' view with an error message
if(!$signedIn) {

    $form->error('email', 'No matching account found for that email address and password')
    ->throw();
}

// Redirect the user to the home page
redirect('/');
