<?php
class Cart {

        // gathering all the items in the cart
        public static function getItems() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        return $_SESSION['cart'];
    }

    //for the icon in header
    public static function getItemCount() {
        if (!isset($_SESSION['cart'])) {
            return 0;
        }
        return array_sum($_SESSION['cart']);
    }
    
    //adds item to the cart, if already there, increase quantity
    public static function addToCart($productId, $itemQuantity = 1) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $itemQuantity;
        } else {
            $_SESSION['cart'][$productId] = $itemQuantity;
        }
        return true;
    }

    // clearrs that product from the cart
    public static function removeFromCart($productId) {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
            return true;
        }
        return false;
    }
}