<?php
session_start();
require_once __DIR__ . '/../models/Cart.php';
//tests adding to cart.
echo "Testing Cart...\n";
$_SESSION['cart'] = [];

Cart::addToCart(1, 2);
if (Cart::getItems()[1] === 2) {
    echo "addToCart test passed\n";
} else {
    echo "addToCart test failed\n";
}

Cart::removeFromCart(1);
if (!isset($_SESSION['cart'][1])) {
    echo "removeFromCart test passed\n";
} else {
    echo "removeFromCart test failed\n";
    print_r($_SESSION['cart']); 
}
?>
