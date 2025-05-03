<?php include "templates/header_guest.php"; ?>


<div class="index-content"> 
    <div class="website-description">
    <p class="intro-text">Welcome to the Two Guys Store, <br>
    Your one stop shop for all the lastest systems and accesories!</p>
    </div>
    

    <div class="platforms">
    <p>Here, we have products available for the following platforms:</p> 
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
    </div>
    <p class="cta-text">Make sure to check out our latest offerings on the products page!</p>
</div>

<?php include "templates/footer.php" ?>