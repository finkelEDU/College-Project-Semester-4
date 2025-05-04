-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table two_guys_db.member: ~4 rows (approximately)
INSERT INTO `member` (`member_id`, `member_username`, `member_password`, `member_email`, `member_type`) VALUES
	(1, 'fintan33', '12345', 'fin33@fin.com', 'Admin'),
	(2, 'oscar22', '67890', 'oscar22@oscar.com', 'Admin'),
	(3, 'fortniteGAMER33', 'Iluvfortnite', 'fortniteGAMER@fin.com', 'Member'),
	(4, 'testUser1208', 'asdfg', 'asdfg@password.com', 'Member');

-- Dumping data for table two_guys_db.orders: ~4 rows (approximately)
INSERT INTO `orders` (`orders_id`, `orders_date`, `product_name`, `member_id`) VALUES
	(1, '2025-05-04 19:01:06', 'Playstation 4', 1),
	(2, '2025-05-04 19:01:06', 'Xbox One X', 1),
	(3, '2025-05-04 19:02:20', 'Nintendo Switch Lite', 4),
	(4, '2025-05-04 19:02:20', 'Playstation 4', 4);

-- Dumping data for table two_guys_db.product: ~13 rows (approximately)
INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_cost`, `product_image`) VALUES
	(1, 'Playstation 5', 'Newest Playstation! Buy now and join the newest games!', 549.99, 'images/ps5.png'),
	(2, 'Playstation 4', 'Older Playstation that\'s still very good!', 399.99, 'images/ps4.png'),
	(3, 'Playstation 3', 'Good for old times!', 299.99, 'images/ps3.png'),
	(4, 'Playstation 2', 'Good for very very old times!', 199.99, 'images/ps2.png'),
	(5, 'Xbox One Series X', 'Best Xbox in existence!', 499.99, 'images/xbox_series_x.png'),
	(6, 'Xbox One Series S', 'Great Xbox that\'s also compact!', 399.99, 'images/xbox_series_s.png'),
	(7, 'Xbox One X', 'Similar to Playstation 4, except an Xbox.', 299.99, 'images/xbox_one_x.png'),
	(8, 'Xbox One S', 'Less power, but still good!', 199.99, 'images/xbox_one_s.png'),
	(9, 'Nintendo Switch OLED', 'Big screen with better quality!', 349.99, 'images/nintendo_switch_oled.png'),
	(10, 'Nintendo Switch', 'Original System to play on TV or portable!', 299.99, 'images/nintendo_switch.png'),
	(11, 'Nintendo Switch Lite', 'Smaller Switch that can be played on the go!', 249.99, 'images/nintendo_switch_lite.png'),
	(12, 'Nintendo Wii', 'Very very old Nintendo with swing controls.', 99.99, 'images/nintendo_wii.jpg'),
	(13, 'Steam Deck', 'Play high-level PC games on the go!', 639.99, 'images/steam_deck.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
