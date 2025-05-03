<?php
    $currentPageParam = $_GET['page'] ?? 'home';
?>

<nav>
    <a href="index.php?page=home" class="<?php echo ($currentPageParam == 'home') ? 'active' : ''; ?>">HOME</a>
    <a href="index.php?page=products" class="<?php echo ($currentPageParam == 'products') ? 'active' : ''; ?>">PRODUCTS</a>
    <?php if (isset($_SESSION["Username"]) && !empty($_SESSION["Username"])): ?>
        <?php // user logged in show: ?>
        <a href="index.php?page=logout">LOG OUT</a>
        <a href="index.php?page=shopping">CART</a> 
    <?php else: ?>
        <?php // user logged out show: ?>
        <a href="index.php?page=login" class="<?php echo ($currentPageParam == 'login') ? 'active' : ''; ?>">LOGIN</a>
        <a href="index.php?page=signup" class="<?php echo ($currentPageParam == 'signup') ? 'active' : ''; ?>">SIGN UP</a>
    <?php endif; ?>
</nav> 