<?php
require_once '../models/Member.php'; 

class SignupController {

    private $dbConnection;
    public function __construct(PDO $connection) {
        $this->dbConnection = $connection;
    }

    public function showSignupForm($message = null, $isError = true) {
        include '../views/signup_view.php';
    }

    public function handleSignup() {
        // basic validation
        if (empty($_POST['inputUsername']) || empty($_POST['inputPassword']) || empty($_POST['inputEmail'])) {
            $this->showSignupForm("Please enter all fields.");
            return;
        }

        $formUsername = $_POST['inputUsername'];
        $formPassword = $_POST['inputPassword']; 
        $formEmail = $_POST['inputEmail'];

        //email checker
        if (!filter_var($formEmail, FILTER_VALIDATE_EMAIL)) {
            $this->showSignupForm("Please enter a valid email address!");
            return;
        }

        //password length check
        if (strlen($formPassword) < 5) {
            $this->showSignupForm("Password must be at least 5 characters!");
            return;
       }

            //check username  if exists
            if (Member::usernameExists($this->dbConnection, $formUsername)) {
                $this->showSignupForm("Username taken.");
                return;
            }

            // create member using the passed data
            $success = Member::createMember(
                $this->dbConnection,
                $formUsername,
                $formPassword,
                $formEmail
            );
            //on success send to login 
            if ($success) {
                header("Location: index.php?page=login&signup=success"); 
                exit;
            } else {
                $this->showSignupForm("Signup Failed.");
            }
    }
}
?>