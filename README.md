A modern and lightweight URL Shortener built with PHP, MySQL, and Bootstrap 5.

Features
Create short URLs instantly
Custom alias support
QR Code generation
Click tracking analytics
Responsive Bootstrap 5 UI
SEO-friendly URLs
Apache Rewrite (.htaccess)
MySQL database storage
Easy deployment on XAMPP, cPanel, or VPS
Technology Stack
PHP 8+
MySQL / MariaDB
Bootstrap 5
JavaScript
Apache Web Server
Installation
1. Clone Repository
git clone https://github.com/yourusername/url.git
2. Move Project

Place the project inside your web server directory:

xampp/htdocs/url
3. Create Database

Create a database named:

url_shortener

Import:

schema.sql
4. Configure Database

Edit:

db.php
$conn = new mysqli(
    "localhost", // database host
    "root", // database user
    "", // database password
    "url_shortener" // database name
);
