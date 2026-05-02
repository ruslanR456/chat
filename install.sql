CREATE DATABASE IF NOT EXISTS `chat_system` DEFAULT CHARACTER SET utf8mb4;
USE `chat_system`;

CREATE TABLE IF NOT EXISTS `messages` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL,
    `message` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB;

INSERT INTO `messages` (`username`, `message`) VALUES ('System', 'Chat initialized successfully.');