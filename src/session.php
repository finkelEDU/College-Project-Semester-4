<?php
class session{
    public function killSession(){
        $_SESSION = [];

        if(ini_get("session.use_cookies")){
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
    }

    public function forgetSession(){
        $this->killSession();
        header("location:index.php");
        exit;
    }
}