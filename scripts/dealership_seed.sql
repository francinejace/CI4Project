-- Import this file in phpMyAdmin
-- It will create schema and seed minimal data for the dealership site

CREATE DATABASE IF NOT EXISTS `ci4project` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ci4project`;

-- Users table
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `username` VARCHAR(100) NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `role` ENUM('customer','admin') NOT NULL DEFAULT 'customer',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_users_email` (`email`),
  UNIQUE KEY `uq_users_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Admin user (password: password)
INSERT INTO `users` (`name`,`email`,`username`,`password_hash`,`role`,`created_at`,`updated_at`) VALUES
('Admin User','admin@example.com','admin','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','admin', NOW(), NOW())
ON DUPLICATE KEY UPDATE email=email;

-- Services table
CREATE TABLE IF NOT EXISTS `services` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NOT NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `services` (`name`,`description`) VALUES
('Preventive Maintenance','Oil/filter change, inspections, calibration'),
('Diagnostics & Repair','ECU scans, drivetrain, suspension, electrical'),
('Financing Assistance','Partner banks and trade‑in support')
ON DUPLICATE KEY UPDATE name=name;

-- Brands table
CREATE TABLE IF NOT EXISTS `brands` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `support` ENUM('Service','Service & Sales') NOT NULL DEFAULT 'Service',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_brands_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `brands` (`name`,`support`) VALUES
('Kia','Service & Sales'),
('Hyundai','Service & Sales'),
('Suzuki','Service')
ON DUPLICATE KEY UPDATE name=name;

-- Positions table
CREATE TABLE IF NOT EXISTS `positions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(120) NOT NULL,
  `department` VARCHAR(120) NOT NULL,
  `location` VARCHAR(120) NOT NULL,
  `status` ENUM('Open','Screening','Closed') NOT NULL DEFAULT 'Open',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `positions` (`title`,`department`,`location`,`status`) VALUES
('Sales Executive','Sales','Quezon City','Open'),
('Service Advisor','After‑Sales','Makati','Open'),
('Technician','Workshop','Pasig','Screening')
ON DUPLICATE KEY UPDATE title=title;
