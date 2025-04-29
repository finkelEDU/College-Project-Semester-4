<?php include "templates/header_guest.php"; ?>


<div class="index-content"> 
    <p class="intro-text">Welcome to the Two Guys Store! Here, you can find games, consoles and accessories to your liking!</p>

    <p>Here, we have products available for the following:</p> 

    <ul class="platform-list"> 
        <?php
        $products = array(
            "Playstation 5" => "images/ps5.png",
            "Playstation 4" => "images/ps4.png",
            "Xbox Series" => "images/xbox_series_x.png",
            "Xbox One" => "images/xbox_one_x.png",
            "Nintendo Switch" => "images/nintendo_switch.png",
            "Nintendo Wii" => "images/nintendo_wii.jpg",
            "Steam Deck" => "images/steam_deck.jpg"
        );

        foreach ($products as $name => $iconPath) { 
          echo "<li><img src='" . $iconPath . "' alt='" . $name . " icon' class='platform-icon'>" . $name . "</li>"; 
        }
        ?>
    </ul>

    <p class="cta-text">Are you ready to explore? You can browse the catalog, but you must be logged in to buy!</p>
</div>

<?php include "templates/footer.php" ?>