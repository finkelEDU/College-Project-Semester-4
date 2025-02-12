<!DOCTYPE html>
<html>
	<head>
		<title>Homepage</title>
	
	</head>

	<body>
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
