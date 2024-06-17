<?php

use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;

// Getting the value of the 'email' field from the form submission
$email = $_POST['email'];

// Getting the value of the 'password' field from the form submission
$password = $_POST['password'];

$form = new LoginForm();

if($form -> validate($email, $password)) {
    // If not found, return the 'sessions/create.view.php' view with an error message
    if((new Authenticator)->attempt($email, $password)) {
        // Redirect the user to the home page
        redirect('/');
    }
    $form->error('email', 'No matching account found for that email address and password');
}

Session::flash('errors', $form -> errors());
Session::flash('old', [
    'email' => $_POST['email']
]);

// Return the 'sessions/create.view.php' view with the errors
return redirect('/login');
