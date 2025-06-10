<?php
// Database configuration
$host = 'localhost';
$dbname = 'todo_app_db'; // We'll create this database
$username = 'root';      // Default XAMPP MySQL username
$password = '';          // Default XAMPP MySQL password (empty)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully to the database!"; // For debugging
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>