<?php
$host = 'localhost';
$db = 'wifi_hotspot';
$user = 'root'; // your mysql user
$pass = '';     // your mysql password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
