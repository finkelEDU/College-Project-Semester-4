<?php
    $currentPageParam = $_GET['page'] ?? 'home';
    require_once '../models/Cart.php';
    $navCart = new Cart();
?>

<nav>
    <a href="index.php?page=home" class="<?php echo ($currentPageParam == 'home') ? 'active' : ''; ?>">HOME</a>
    <a href="index.php?page=products" class="<?php echo ($currentPageParam == 'products'|| $currentPageParam == 'product_details') ? 'active' : ''; ?>">PRODUCTS</a>
    <?php if (isset($_SESSION["Username"]) && !empty($_SESSION["Username"])): ?>
        <?php // user logged in show: ?>
        <a href="index.php?page=logout">LOG OUT</a>
        <a href="index.php?page=shopping_cart" class="<?php echo ($currentPageParam == 'shopping_cart') ? 'active' : ''; ?>">CART<?php 
           $itemCount = $navCart->getItemCount(); 
            echo  " <span>($itemCount)</span>"; 
        ?></a> 
        <?php if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true): ?>
                <a href="index.php?page=admin" class="<?php echo ($currentPageParam == 'admin') ? 'active' : ''; ?>">ADMIN</a>
            <?php endif; ?>
    <?php else: ?>
        <?php // user logged out show: ?>
        <a href="index.php?page=login" class="<?php echo ($currentPageParam == 'login') ? 'active' : ''; ?>">LOGIN</a>
        <a href="index.php?page=signup" class="<?php echo ($currentPageParam == 'signup') ? 'active' : ''; ?>">SIGN UP</a>
    <?php endif; ?>
</nav> 