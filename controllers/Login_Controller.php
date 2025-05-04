<?php
require_once '../models/Member.php';

class LoginController {

    private $dbConnection;
    public function __construct(PDO $connection) {
        $this->dbConnection = $connection;
    }
    //shows login form
    public function showLoginForm($error = null) {
        include '../views/login_view.php';
    }


    public function handleLogin() {
        if (!isset($_POST["inputUsername"]) || !isset($_POST["inputPassword"])) {
            $this->showLoginForm("Please enter a username and password.");
            return;
        }


                $inputUser = $_POST["inputUsername"];
                $inputPass = $_POST["inputPassword"]; 
                // authenticate through member model 
                $user = Member::authenticate($this->dbConnection, $inputUser, $inputPass);

                if ($user) {
                    // if log in successful, store their data 
                    $_SESSION["Username"] = $user["member_username"];
                    $_SESSION["UserID"] = $user["member_id"];
                    //sets admin if admin
                    $_SESSION["Admin"] = ($user["member_type"] === "Admin");
                    header("Location: index.php?page=products");
                    exit;
                } else {
                    $this->showLoginForm("Invalid username or password.");
                }
    }
  
    public function logout() {
        //unset all user session data
        $_SESSION = [];

        // delete session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
 // redirect to home page on logout
        header("Location: index.php?page=home"); 
        exit;
    }
}
?>