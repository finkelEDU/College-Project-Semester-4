CREATE DATABASE IF NOT EXISTS two_guys_db;

use two_guys_db;

CREATE TABLE IF NOT EXISTS Member(
	member_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	member_username VARCHAR(30) NOT NULL,
	member_password VARCHAR(255) NOT NULL,
	member_email VARCHAR(80) NOT NULL,
	member_dob DATE NOT NULL,
	member_type VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS Product(
	product_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	product_name VARCHAR(50) NOT NULL,
	product_description VARCHAR(255) NOT NULL,
	product_cost FLOAT(10) NOT NULL,
	product_image VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Orders(
	orders_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	orders_date TIMESTAMP,
	product_name VARCHAR(50) NOT NULL,
	member_id INT(10) UNSIGNED NOT NULL,
	FOREIGN KEY (member_id) REFERENCES Member(member_id)
);

/*Insert Admins and a test user*/
INSERT INTO Member(member_username, member_password, member_email, member_dob, member_type) VALUES ("fintan33", "12345", "fin33@fin.com", "1991-11-07", "Admin");
INSERT INTO Member(member_username, member_password, member_email, member_dob, member_type) VALUES ("oscar22", "67890", "oscar22@oscar.com", "2000-05-22", "Admin");
INSERT INTO Member(member_username, member_password, member_email, member_dob, member_type) VALUES ("fortniteGAMER33", "Iluvfortnite", "fortniteGAMER@fin.com", "2010-07-30", "Member");

/*Insert the Products*/
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Playstation 5", "Newest Playstation! Buy now and join the newest games!", 499.99, "images/ps5.png");
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Playstation 4", "Older Playstation that's still very good!", 499.99, "images/ps4.png");
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Playstation 3", "Good for old times!", 499.99, "images/ps3.png");
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Playstation 2", "Good for very very old times!", 499.99, "images/ps2.png");
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Xbox One Series X", "Best Xbox in existence!", 499.99, "images/xbox_series_x.png");
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Xbox One Series S", "Great Xbox that's also compact!", 499.99, "images/xbox_series_s.png");
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Xbox One X", "Similar to Playstation 4, except an Xbox.", 499.99, "images/xbox_one_x.png");
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Xbox One S", "Less power, but still good!", 499.99, "images/xbox_one_s.png");
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Nintendo Switch OLED", "Big screen with better quality!", 499.99, "images/nintendo_switch_oled.png");
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Nintendo Switch", "Original System to play on TV or portable!", 499.99, "images/nintendo_switch.png");
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Nintendo Switch Lite", "Smaller Switch that can be played on the go!", 499.99, "images/nintendo_switch_lite.png");
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Nintendo Wii", "Very very old Nintendo with swing controls.", 499.99, "images/nintendo_wii.jpg");
INSERT INTO Product(product_name, product_description, product_cost, product_image) VALUES ("Steam Deck", "Play high-level PC games on the go!", 499.99, "images/steam_deck.jpg");