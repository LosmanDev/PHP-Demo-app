<?php

use Core\Validator;

$email = $_POST['email'];

$password = $_POST['PASSWORD'];

$errors = [];

if(!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if(!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a valid password';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
     'errors' => $errors
    ]);
}
