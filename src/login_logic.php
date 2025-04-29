<?php

class login_logic{
	
	public function check(){		
		if(isset($_POST["Submit"])){
			try{
				require_once "../config.php";
				$connection = new PDO($dsn, $username, $password, $options);
				
				$sql = "SELECT member_username, member_password, member_type FROM Member where member_username = :inputUsername";
				$statement = $connection->prepare($sql);
				$tmpUser = ($_POST["inputUsername"]);
				$statement->bindParam(":inputUsername", $tmpUser);
				$statement->execute();
				$result = $statement->fetchAll();
				
				foreach($result as $row => $rows){
					$uname_db = $rows["member_username"];
					$pwd_db = $rows["member_password"];
					$type_db = $rows["member_type"];
					
					if((escape($_POST["inputUsername"]) == $uname_db) && (escape($_POST["inputPassword"]) == $pwd_db)){
						$_SESSION["Username"] = $uname_db;
						$_SESSION["Active"] = true;

						if($type_db == "Admin"){
							$_SESSION["Admin"] = true;
						}else{
							$_SESSION["Admin"] = false;
						}

						//keeps track of members cart
						if (!isset($_SESSION['cart'])) {
							$_SESSION['cart'] = [];
						}
						
						header("location:index.php");
						exit;
					}else{
						echo "Incorrect username or password";
					}
				}
			}catch(PDOException $error){
				$error->getMessage();
			}
		}
	}
}