<?php
	session_start();

	if($_SESSION["Admin"] == false){
		header("location:login.php");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<link rel="stylesheet" href="css/common.css" />
	
	<title>Two Guys Store</title>
<head>

<body>
	<<div id="HeaderBanner">
        <h1>TwoGuys</h1>
        <?php?>
    </div>
	<p>Welcome <?php echo $_SESSION["Username"];?> </p>
