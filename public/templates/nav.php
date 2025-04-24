
<nav>
    <a href="index.php">HOME PAGE</a>
    <a href="products.php">PRODUCTS</a>
    <?php if (isset($_SESSION["Username"]) && !empty($_SESSION["Username"])): ?>
        <?php // user logged in, show log out btn ?>
        <a href="logout.php">LOG OUT</a>
    <?php else: ?>
        <a href="login.php">LOGIN</a>
        <a href="signup.php">SIGN UP</a>
    <?php endif; ?>
</nav>