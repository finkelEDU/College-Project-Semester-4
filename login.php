<?php
	require "../common.php";
?>

<?php include "templates/header_guest.php"; ?>
	<h1>LOGIN</h1>
	<form method="post">
		<label for="username"><strong>Username</strong></label>
		<input type="text" name="inputUsername" id="inputUsername" required>
		<br>
		<label for="password"><strong>Password</strong></label>
		<input type="password" name="inputPassword" id="inputPassword" required>
		<br>
		<input type="submit" name="Submit" value="submit">
	</form>
	
	<?php
		require "../src/login_logic.php";
		$login = new login_logic();
		$login->check();
	?>
	
<?php include "templates/footer.php"; ?>