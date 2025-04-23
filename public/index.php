<?php include "templates/header_guest.php"; ?>
<?php include "templates/nav.php"; ?>
	<p>Welcome to the Two Guys Store! Here, you can find games, consoles and accessories to your liking!</p>

	<p>Here, we have products available for the following</p>
		<?php  
		
		$products = array(
			"Playstation 5",
			"Playstation 4",
			"Xbox Series",
			"Xbox One",
			"Nintendo Switch",
			"Nintendo Wii",
			"Nintendo DS",
			"PC"
		);
		
		
		for($x = 0; $x < 8; $x++){
		  echo $products[$x];
		  echo "<br>";
		}?>

		<p>Are you ready to explore? You can browse the catalog, but you must be logged in to buy!</p>
<?php include "templates/footer.php" ?>