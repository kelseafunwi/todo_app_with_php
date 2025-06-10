<?php
require_once 'includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        echo "Task deleted successfully!";
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Error deleting task: " . $e->getMessage();
    }
} else {
    http_response_code(400);
    echo "Invalid request or missing ID.";
}
?>