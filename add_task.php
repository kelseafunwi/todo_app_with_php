<?php
require_once 'includes/config.php';

header('Content-Type: application/json');

if (!isLoggedIn()) {
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$due_date = filter_input(INPUT_POST, 'due_date', FILTER_SANITIZE_STRING);
$priority = filter_input(INPUT_POST, 'priority', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

if (!$title) {
    echo json_encode(['success' => false, 'message' => 'Title is required']);
    exit;
}

try {
    $conn = getDBConnection();
    $stmt = $conn->prepare("
        INSERT INTO tasks (user_id, title, description, due_date, priority, status)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    
    $stmt->execute([
        $_SESSION['user_id'],
        $title,
        $description,
        $due_date ?: null,
        $priority ?: 'Low',
        $status ?: 'To Do'
    ]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error']);
}
?>