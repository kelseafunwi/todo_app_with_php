$(document).ready(function() {
    // Add Task
    $('#saveTask').click(function() {
        const formData = $('#addTaskForm').serialize();
        
        $.ajax({
            url: 'add_task.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('An error occurred while saving the task.');
            }
        });
    });

    // Edit Task - Load Data
    $('.edit-task').click(function() {
        const taskId = $(this).data('task-id');
        
        $.ajax({
            url: 'get_task.php',
            type: 'GET',
            data: { task_id: taskId },
            success: function(response) {
                if (response.success) {
                    const task = response.task;
                    $('#edit_task_id').val(task.task_id);
                    $('#edit_title').val(task.title);
                    $('#edit_description').val(task.description);
                    $('#edit_due_date').val(task.due_date);
                    $('#edit_priority').val(task.priority);
                    $('#edit_status').val(task.status);
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('An error occurred while loading the task.');
            }
        });
    });

    // Update Task
    $('#updateTask').click(function() {
        const formData = $('#editTaskForm').serialize();
        
        $.ajax({
            url: 'update_task.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('An error occurred while updating the task.');
            }
        });
    });

    // Delete Task
    $('.delete-task').click(function() {
        if (confirm('Are you sure you want to delete this task?')) {
            const taskId = $(this).data('task-id');
            
            $.ajax({
                url: 'delete_task.php',
                type: 'POST',
                data: { task_id: taskId },
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while deleting the task.');
                }
            });
        }
    });
}); 