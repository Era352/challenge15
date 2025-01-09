-- Create the database
CREATE DATABASE IF NOT EXISTS product_management;
USE product_management;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(100) NOT NULL,
    quantity INT NOT NULL, 
    price VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin Table
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(100) NOT NULL,
    quantity INT NOT NULL, 
    price VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample Admin Records
INSERT INTO admin (title, description, quantity, price) 
VALUES ('White Nights', 'Psychological, romantic book', 5, '13$');

-- Sample User Records
INSERT INTO users (title, description, quantity, price) VALUES
('Crime and Punishment', 'Philosophical and Psychological Book', 6, '20$'),
('Karazimov Brothers', 'Ethical, Moral Book', 3, '21$');