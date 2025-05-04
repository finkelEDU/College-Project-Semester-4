<?php
class Cart {
        public static function getItems() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        return $_SESSION['cart'];
    }

    
    public static function addToCart($productId, $quantity = 1) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }
        return true;
    }

    public static function getItemCount() {
        if (!isset($_SESSION['cart'])) {
            return 0;
        }
        return array_sum($_SESSION['cart']);
    }
}