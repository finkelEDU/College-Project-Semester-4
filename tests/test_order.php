<?php
require_once __DIR__ . '/../models/Orders.php'; // __dir__ to get correct path for light testing in terminal
require_once __DIR__ . '/../config.php';

echo "Testing Order...\n";

    $dsn = "mysql:host=" . $host . ";dbname=" . $dbname; 
    $connection = new PDO($dsn, $username, $password, $options); 

    $ordersModel = new Orders($connection);

    //test data
    $testMemberId = 3; //just to test 
    $testProductName = "Test Product";
    $testOrderDate = date('Y-m-d H:i:s');

    $result = $ordersModel->createOrder($testMemberId, $testProductName, $testOrderDate);

    if ($result === true) {
        echo "Order Test Success.\n";
    } else {
        echo "Order Test Failure.\n";
    }

?>