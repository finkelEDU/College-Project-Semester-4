<!DOCTYPE html>
<html>
	<head>
		<title>Homepage</title>
	
	</head>

	<body>
		<!--Image to be used with one php function later throughout all webpages-->
		<img src="Images/banner.png" alt="banner">
	
	<!--Below from lab02-->
		<?php  
		
		$products = array(	"Playstation 5",
							"Xbox Series X",
							"Xbox One",
							"Nintendo Switch",
							"Nintendo Wii"
						);
		
		
		for($x = 0; $x < 5; $x++){
		  echo $products[$x];
		  echo "<br>";
		}?>

	</body>
</html>
