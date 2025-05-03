<?php
require_once '../models/Member.php'; 

class SignupController {

    public function showSignupForm($message = null, $isError = true) {
        include '../views/signup_view.php';
    }

    public function handleSignup() {
        // basic validation
        if (empty($_POST['inputUsername']) || empty($_POST['inputPassword']) || empty($_POST['inputEmail'])) {
            $this->showSignupForm("Please enter all fields.");
            return;
        }

        $formUsername = escape($_POST['inputUsername']);
        $formPassword = escape($_POST['inputPassword']); 
        $formEmail = escape($_POST['inputEmail']);

        try {

            require_once '../config.php';
            global $dsn, $username, $password, $options;
            $connection = new PDO($dsn, $username, $password, $options);

            //check username  if exists
            if (Member::usernameExists($connection, $formUsername)) {
                $this->showSignupForm("Username taken.");
                return;
            }

            // create member using the passed data
            $success = Member::createMember(
                $connection,
                $formUsername,
                $formPassword,
                $formEmail
            );

            if ($success) {
                header("Location: index.php?page=login&signup=success"); 
                exit;
            } else {
                $this->showSignupForm("Signup Failed.");
            }

        } catch(PDOException $error) {
            $this->showSignupForm("DB error: " . $error->getMessage());
        }
    }
}
?>