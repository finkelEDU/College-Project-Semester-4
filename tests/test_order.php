<?php
require_once __DIR__ . '/../models/Orders.php';
require_once __DIR__ . '/../config.php';

echo "Testing Order...\n";

    $dsn = "mysql:host=" . $host . ";dbname=" . $dbname; 
    $connection = new PDO($dsn, $username, $password, $options); 

    //test data
    $testMemberId = 3; //just to test 
    $testProductName = "Test Product";

    $result = Orders::createOrder($connection, $testMemberId, $testProductName);
    if ($result === true) {
        echo "Order Test Success.\n";
    } else {
        echo "Order Test Failure.\n";
    }

?>