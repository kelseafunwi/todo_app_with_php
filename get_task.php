<?php
require_once 'includes/config.php';

header('Content-Type: application/json');

if (!isLoggedIn()) {
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit;
}

if (!isset($_GET['task_id'])) {
    echo json_encode(['success' => false, 'message' => 'Task ID is required']);
    exit;
}

$task_id = filter_input(INPUT_GET, 'task_id', FILTER_VALIDATE_INT);

if (!$task_id) {
    echo json_encode(['success' => false, 'message' => 'Invalid task ID']);
    exit;
}

try {
    $conn = getDBConnection();
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE task_id = ? AND user_id = ?");
    $stmt->execute([$task_id, $_SESSION['user_id']]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($task) {
        echo json_encode(['success' => true, 'task' => $task]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Task not found']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error']);
}
?> 