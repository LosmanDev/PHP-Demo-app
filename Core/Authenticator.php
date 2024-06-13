<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        // Querying the database to find a user with the given email
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        // Check if the user is not found in the database
        if ($user) {
            // Verify if the provided password matches the hashed password stored in the database
            if (password_verify($password, $user['password'])) {
                // If the password is correct, log in the user by storing their email in the session
                $this -> login([
                    'email' => $email
                ]);

                // Redirect the user to the home page
                header('location: /');
                exit();
            }

        }
        return true;

    }

    public function login($user)
    {
        $_SESSION['user'] = [
         'email' =>  $user['email']
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        // Clear the session data
        $_SESSION = [];
        session_destroy();

        // Clear the session cookie
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
