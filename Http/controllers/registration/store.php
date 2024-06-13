<?php

// Importing the Validator class from the Core namespace
use Core\Validator;
// Importing the App class from the Core namespace
use Core\App;
// Importing the Database class from the Core namespace
use Core\Database;

// Resolving the Database class using the App class
$db = App::resolve(Database::class);

// Getting the value of the 'email' field from the form submission
$email = $_POST['email'];

// Getting the value of the 'password' field from the form submission
$password = $_POST['password'];

// Creating an empty array to store validation errors
$errors = [];

// Checking if the email is valid using the Validator class
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

// Checking if the password is a string with a minimum length of 7 characters using the Validator class
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

// If there are any validation errors, return the 'registration/create.view.php' view with the errors
if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// Querying the database to find a user with the given email
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

// If a user with the given email exists, redirect to the homepage
if ($user) {

    header('location:/');

} else {
    // If no user with the given email exists, insert a new user into the database
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
    
    // Store the user's email in the session
    login($user);

    // Redirect the user to the home page
    header('location: /');
    exit();
}
