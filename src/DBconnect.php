<?php
	require_once "../config.php";
	
	try{
		$connection = new PDO($dsn, $username, $password, $options);
		echo "Database connected!!<br>";
	}catch(\PDOException $error){
		throw new \PDOException($error->getMessage(), (int)$error->getCode());
	}
?>