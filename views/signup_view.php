<?php include "../public/templates/header_guest.php";?>

<div class="login-box"> <?php //reused ?>
<h1>WELCOME!</h1>
    <p > 
        You are very close to becoming a Two Guys Store member! Just fill in the form below to get started.
    </p>

    <?php
    if (isset($message) && $message):
        $messageColor = $isError ? 'red' : 'green';
    ?>
        <p style="color: <?php echo $messageColor; ?>; margin-bottom: 15px;"><?php echo escape($message); ?></p>
    <?php endif; ?>


    <form method="post" action="index.php?page=signup">
        <label for="inputUsername"><strong>Username</strong></label>
        <input type="text" name="inputUsername" id="inputUsername" required>

        <label for="inputPassword"><strong>Password</strong></label>
        <input type="password" name="inputPassword" id="inputPassword" required>

        <label for="inputEmail"><strong>Email</strong></label>
        <input type="email" name="inputEmail" id="inputEmail" required>

        <input type="submit" name="submit" value="Sign Up">
    </form>
</div>

<?php include "../public/templates/footer.php";?>