<?php include "templates/header_guest.php"; ?>


<div class="index-content"> 
    <p class="intro-text">Welcome to the Two Guys Store! Here, you can find games, consoles and accessories to your liking!</p>

    <p>Here, we have products available for the following:</p> 

    <ul class="platform-list"> 
        <?php
        $products = array(
            "Playstation 5",
            "Playstation 4",
            "Xbox Series",
            "Xbox One",
            "Nintendo Switch",
            "Nintendo Wii",
            "PC"
        );

        foreach ($products as $product) { 
          echo "<li>" . $product . "</li>"; 
        }
        ?>
    </ul>

    <p class="cta-text">Are you ready to explore? You can browse the catalog, but you must be logged in to buy!</p>
</div>

<?php include "templates/footer.php" ?>