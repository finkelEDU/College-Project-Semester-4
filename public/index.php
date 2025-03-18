<?php include "templates/header.php" ?>
	<p>Welcome to the Two Guys Store! Here, you can find games, consoles and accessories to your liking!</p>
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
<?php include "templates/footer.php" ?>