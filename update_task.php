<?php
require_once 'includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $isCompleted = $_POST['status']; // 0 or 1

    try {
        $stmt = $pdo->prepare("UPDATE tasks SET is_completed = ? WHERE id = ?");
        $stmt->execute([$isCompleted, $id]);
        echo "Task updated successfully!";
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Error updating task: " . $e->getMessage();
    }
} else {
    http_response_code(400);
    echo "Invalid request or missing data.";
}
?>