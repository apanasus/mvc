CREATE DATABASE IF NOT EXISTS mvc_project;
USE mvc_project;

CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `clicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX (`offer_id`),
  INDEX (`ip_address`),
  INDEX (`created_at`),
  FOREIGN KEY (`offer_id`) REFERENCES `offers`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
