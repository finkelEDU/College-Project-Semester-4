<?php
require_once '../models/Member.php';

class LoginController {

    public function showLoginForm($error = null) {
        include '../views/login_view.php';
    }

    public function handleLogin() {
        if (!isset($_POST["inputUsername"]) || !isset($_POST["inputPassword"])) {
            $this->showLoginForm("Please enter a username and password.");
            return;
        }

        try {
            global $dsn, $username, $password, $options; 
            
            $connection = new PDO($dsn, $username, $password, $options);

              
                $inputUser = $_POST["inputUsername"];
                $inputPass = $_POST["inputPassword"]; 
          
                $user = Member::authenticate($connection, $inputUser, $inputPass);

                    $_SESSION["Username"] = $user["member_username"];
                    $_SESSION["UserID"] = $user["member_id"];
                    $_SESSION["Admin"] = ($user["member_type"] === "Admin");
                    header("Location: index.php?page=home");
                    exit;


        } catch(PDOException $error) {
            $this->showLoginForm("error!");
        }
    }
  
    public function logout() {
        
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

        header("Location: index.php?page=home"); 
        exit;
    }
}
?>