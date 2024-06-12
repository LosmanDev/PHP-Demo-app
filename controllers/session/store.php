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
if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password.';
}

// If there are any validation errors, return the 'sessions/create.view.php' view with the errors
if (! empty($errors)) {
    return view('session/create.view.php', [
      'errors' => $errors
    ]);
}

// Querying the database to find a user with the given email
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

// Check if the user is not found in the database
if ($user) {
    // Verify if the provided password matches the hashed password stored in the database
    if (password_verify($password, $user['password'])) {
        // If the password is correct, log in the user by storing their email in the session
        login([
            'email' => $email
        ]);

        // Redirect the user to the home page
        header('location: /');
        exit();
    }

}
// If not found, return the 'sessions/create.view.php' view with an error message
return view('session/create.view.php', [
   'errors' => ['email' => 'No matching account found']
]);
