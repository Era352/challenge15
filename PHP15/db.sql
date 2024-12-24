-- Create the database
CREATE DATABASE IF NOT EXISTS product_management;
USE product_management;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(50) NOT NULL UNIQUE,
    Description VARCHAR(100) NOT NULL UNIQUE,
    Qunatity VARCHAR(255) NOT NULL, 
    Price VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin Table
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Title   VARCHAR(50) NOT NULL UNIQUE,
    Description VARCHAR(100) NOT NULL UNIQUE,
    Qunatity VARCHAR(100) NOT NULL, 
    Price VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample Admin Records (Title: White Nights, Price:13$)
INSERT INTO admin (Title, Description, Quantity, Price) 
VALUES ('White Nights', 'Psychological, romantic book', '5', '13$', );

-- Sample User Records
INSERT INTO users (Title, Description, Quantity, Price) VALUES
('Crime and Punishment', 'Philosophical and Psychological Book', '6', '20$'),
('Karazimov Borthes', 'Ethical, Moral Book', '3', '21$');
