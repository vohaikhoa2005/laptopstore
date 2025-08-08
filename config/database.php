<?php
// config/database.php
// Kết nối đến MySQL với dbname là 'demo'
// Thông tin kết nối
$host = 'localhost';
$dbname = 'laptopstore';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Kết nối thất bại: ' . $e->getMessage());
}
