<?php
    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav>
    <a href="index.php" class="<?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">HOME</a>
    <a href="products.php" class="<?php echo ($currentPage == 'products.php') ? 'active' : ''; ?>">PRODUCTS</a>
    <?php if (isset($_SESSION["Username"]) && !empty($_SESSION["Username"])): ?>
        <?php // user logged in show: ?>
        <a href="logout.php">LOG OUT</a>
        <a href="shopping.php">CART</a> 
    <?php else: ?>
        <?php // user logged out show: ?>
        <a href="login.php" class="<?php echo ($currentPage == 'login.php') ? 'active' : ''; ?>">LOGIN</a>
        <a href="signup.php" class="<?php echo ($currentPage == 'signup.php') ? 'active' : ''; ?>">SIGN UP</a>
    <?php endif; ?>
</nav>