-- Create the database
CREATE DATABASE IF NOT EXISTS `chat_app` DEFAULT CHARACTER SET utf8mb4;
USE `chat_app`;

-- Create the messages table
CREATE TABLE IF NOT EXISTS `messages` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_name` VARCHAR(50) NOT NULL,
    `msg_text` TEXT NOT NULL,
    `posted_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
