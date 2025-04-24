<?php
    require "../common.php";
?>

<?php include "templates/header_guest.php"; ?>
<?php include "templates/nav.php"; ?>
    <div class="login-box"> 
        <h1>LOGIN</h1>
        <form method="post">
            <label for="inputUsername"><strong>Username</strong></label>
            <input type="text" name="inputUsername" id="inputUsername" required>

            <label for="inputPassword"><strong>Password</strong></label>
            <input type="password" name="inputPassword" id="inputPassword" required>

            <input type="submit" name="Submit" value="Submit">
        </form>
    </div>

    <?php
        require "../src/login_logic.php";
        $login = new login_logic();
        $login->check();
    ?>

<?php include "templates/footer.php"; ?>