CREATE DATABASE IF NOT EXISTS two_guys_db;

use two_guys_db;

CREATE TABLE IF NOT EXISTS Member(
	member_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	member_username VARCHAR(30) NOT NULL,
	member_password VARCHAR(255) NOT NULL,
	member_email VARCHAR(80) NOT NULL,
	member_dob DATE NOT NULL
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
	orders_date DATE,
	member_id INT(10) UNSIGNED NOT NULL,
	FOREIGN KEY (member_id) REFERENCES Member(member_id)
);