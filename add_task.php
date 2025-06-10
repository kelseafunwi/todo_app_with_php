<?php
require_once 'includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
    $task = trim($_POST['task']);

    if (!empty($task)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO tasks (task_name) VALUES (?)");
            $stmt->execute([$task]);
            echo "Task added successfully!";
        } catch (PDOException $e) {
            http_response_code(500); // Internal Server Error
            echo "Error adding task: " . $e->getMessage();
        }
    } else {
        http_response_code(400); // Bad Request
        echo "Task cannot be empty.";
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo "Invalid request method or missing task data.";
}
?>