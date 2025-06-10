<?php
require_once 'includes/db_config.php';

try {
    $stmt = $pdo->query("SELECT id, task_name, is_completed FROM tasks ORDER BY id DESC");
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($tasks) {
        foreach ($tasks as $task) {
            $checked = $task['is_completed'] ? 'checked' : '';
            $completed_class = $task['is_completed'] ? 'completed' : '';
            echo "<li class='task-item {$completed_class}'>";
            echo "<div>";
            echo "<input type='checkbox' class='status-checkbox' data-id='{$task['id']}' {$checked}>";
            echo "<span>" . htmlspecialchars($task['task_name']) . "</span>";
            echo "</div>";
            echo "<div class='task-actions'>";
            // echo "<button class='edit-btn' data-id='{$task['id']}'>Edit</button>"; // Enable if you implement edit functionality
            echo "<button class='delete-btn' data-id='{$task['id']}'>Delete</button>";
            echo "</div>";
            echo "</li>";
        }
    } else {
        echo "<p>No tasks yet. Add one above!</p>";
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo "Error retrieving tasks: " . $e->getMessage();
}
?>