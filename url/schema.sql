CREATE DATABASE IF NOT EXISTS url_shortener;
USE url_shortener;
CREATE TABLE admins(id INT AUTO_INCREMENT PRIMARY KEY,username VARCHAR(50),password VARCHAR(255));
CREATE TABLE urls(id INT AUTO_INCREMENT PRIMARY KEY,short_code VARCHAR(100) UNIQUE,long_url TEXT,clicks INT DEFAULT 0);
-- password: admin123
INSERT INTO admins(username,password) VALUES ('admin','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9lbSAyYlL5G5G7GQz5j5uG');
