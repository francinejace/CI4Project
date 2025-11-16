-- Create the `users` table for login/registration
-- Use in phpMyAdmin: select the `ci4project` database first, then run this script.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Optional: create an admin by first registering via /register (password is hashed by PHP),
-- then update their role to 'admin' in phpMyAdmin:
--   UPDATE users SET role='admin' WHERE email='your_email@example.com';

-- If you must insert an admin directly here, you need a bcrypt hash for the password.
-- You can generate one in PHP using: password_hash('adminpass', PASSWORD_DEFAULT)
-- and paste the resulting string below as the value for `password_hash`.
-- Example (replace <HASH> with an actual bcrypt string produced by password_hash):
-- INSERT INTO users (name,email,username,password_hash,role,created_at,updated_at)
-- VALUES ('Admin User','admin@example.com','admin','<HASH>','admin', NOW(), NOW());
