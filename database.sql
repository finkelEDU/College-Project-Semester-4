CREATE SCHEMA IF NOT EXISTS `two_guys_database` DEFAULT CHARACTER SET utf8 ;
USE `two_guys_database` ;

CREATE TABLE IF NOT EXISTS `Product` (
  `product_id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`product_id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `Member` (
  `member_id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NULL,
  `password` VARCHAR(100) NULL,
  `date_of_birth` DATE NULL,
  PRIMARY KEY (`member_id`))
ENGINE = InnoDB;

INSERT INTO Member (username, password, date_of_birth)
VALUES ("mr_firstuser", "zebra123", '2025-02-26');
INSERT INTO Member (username, password, date_of_birth)
VALUES ("ms_seconduser", "bananas123", '2025-02-26');
INSERT INTO Member (username, password, date_of_birth)
VALUES ("toptiergamer", "fortnite3", '2025-02-26');

CREATE TABLE IF NOT EXISTS `Order` (
  `order_id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`order_id`))
ENGINE = InnoDB;