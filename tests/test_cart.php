<?php
session_start();
require_once '/../models/Cart.php';
//tests adding to cart.

$_SESSION['cart'] = [];

Cart::addToCart(1, 2);
if (Cart::getItems()[1] === 2) {
    echo "addToCart test passed\n";
} else {
    echo "addToCart test failed\n";
}
?>
