<?php
require_once '../models/Member.php'; 

class SignupController {

    private $dbConnection;
    private $memberModel;
    public function __construct(PDO $connection) {
        $this->dbConnection = $connection;
        $this->memberModel = new Member($this->dbConnection);
    }

    public function showSignupForm() {
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
            $this->showSignupForm();
			echo "Password must be at least 5 characters!";
            return;
       }

            //check username  if exists
            if ($this->memberModel->usernameExists($formUsername)) {
                $this->showSignupForm();
				echo "Username taken";
                return;
            }

            // create member using the passed data
            $success = $this->memberModel->createMember(
                $formUsername,
                $formPassword,
                $formEmail
            );
            //on success send to login 
            if ($success) {
                header("Location: index.php?page=login&signup=success"); 
                exit;
            } else {
                $this->showSignupForm();
				echo "Signup Failed.";
            }
    }
}
?>