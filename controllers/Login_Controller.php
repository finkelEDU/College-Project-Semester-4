<?php

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

                $sql = "SELECT member_username, member_password, member_type FROM Member WHERE member_username = :inputUsername";
                $statement = $connection->prepare($sql);
                $inputUser = $_POST["inputUsername"];
                $inputPass = $_POST["inputPassword"]; 
                $statement->bindParam(":inputUsername", $inputUser);
                $statement->execute();

            
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if ($user && (escape($inputPass) == $user["member_password"])) {
               
                $_SESSION["Username"] = $user["member_username"];
                $_SESSION["Active"] = true;
                $_SESSION["Admin"] = ($user["member_type"] === "Admin");

                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                header("Location: index.php?page=home");
                exit;
            } else {
                $this->showLoginForm("Uh Oh! incorrect username or password.");
            }

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