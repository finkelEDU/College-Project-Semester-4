
<?php include "../public/templates/header_guest.php"; ?>

<div class="login-box">
    <h1>LOGIN</h1>

    <?php // if login fail, show error ?>
    <?php if (isset($error) && $error): ?>
        <p style="color: red;  margin-bottom: 15px;"><?php echo escape($error); ?></p>
    <?php endif; ?>
    
    <form method="post" action="index.php?page=login"> 
        <label for="inputUsername"><strong>Username</strong></label>
        <input type="text" name="inputUsername" id="inputUsername" required>

        <label for="inputPassword"><strong>Password</strong></label>
        <input type="password" name="inputPassword" id="inputPassword" required>
        <input type="submit" value="Log In">
    </form>
</div>


<?php include "../public/templates/footer.php";?>