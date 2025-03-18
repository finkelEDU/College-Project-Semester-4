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
			);
			
			$sql = sprintf("INSERT INTO %s (member_%s) values (%s)", "Member",
							implode(", member_", array_keys($new_user)),
							":" . implode(", :", array_keys($new_user))
							); 
							
			$statement = $connection->prepare($sql);
			$statement->execute($new_user);
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}
	
	if(isset($_POST["submit"]) && $statement){
		echo $new_user["username"] . " successfully added!";
	}
?>

<?php include "templates/header.php" ?>
	<h1>WELCOME!</h1>
	<p>
		You are very close to becoming a Two Guys Store member! Just fill in the form below to get started.
	</p>
        
    <div>
		<form method="post">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" required>
			
			<label for="password">Password</label>
			<input type="text" name="password" id="password" required>
			
			<label for="email">Email</label>
			<input type="email" name="email" id="email" required>
			
			<label for="dob">Date of Birth</label>
			<input type="date", name="dob" id="dob" required>
			<br><br>
			<input type="submit" name="submit" value="Submit">
		</form>
	</div>
<?php include "templates/footer.php" ?>