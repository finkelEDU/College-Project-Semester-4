<?php
	if(isset($_POST["submit"])){
		require "../common.php";
		
		try{
			require_once "../src/DBconnect.php";
			
			$new_user = array(
				"username"	=>	escape($_POST["username"]),
				"password"	=>	escape($_POST["password"]),
				"email"		=>	escape($_POST["email"]),
				"dob"		=>	escape($_POST["dob"]),
				"type"      =>  'Member'
			);
			
			$sql = sprintf("INSERT INTO %s (%s) values (%s)",
                            "Member", 
                            implode(", ", array_map(function($key) { return "member_" . $key; }, array_keys($new_user))), 
                            ":" . implode(", :", array_keys($new_user))
                           ); 
							
			$statement = $connection->prepare($sql);
			$statement->execute($new_user);
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}
	
	if(isset($_POST["submit"]) && $statement){
		//echo $new_user["username"] . " successfully added!";
		echo "Welcome to the website, ". $new_user["username"] . "!!";
	}
?>

<?php include "templates/header_guest.php"; ?>
<div class="login-box"> <?php // Reusing?>
    <h1>WELCOME!</h1>
    <p style="margin-bottom: 20px; color: var(--text-medium);"> 
        You are very close to becoming a Two Guys Store member! Just fill in the form below to get started.
    </p>

    <form method="post">
        <label for="username"><strong>Username</strong></label>
        <input type="text" name="username" id="username" required>

        <label for="password"><strong>Password</strong></label>
        <input type="password" name="password" id="password" required>

        <label for="email"><strong>Email Address</strong></label>
        <input type="email" name="email" id="email" required>

        <label for="dob"><strong>Date of Birth</strong></label>
        <input type="date" name="dob" id="dob" required>

        <input type="submit" name="submit" value="Sign Up">
    </form>
</div>
<?php include "templates/footer.php" ?>