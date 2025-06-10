$(document).ready(function() {
    // Function to load tasks
    function loadTasks() {
        $.ajax({
            url: 'get_tasks.php',
            type: 'GET',
            success: function(response) {
                $('#task-list').html(response);
            },
            error: function(xhr, status, error) {
                console.error("Error loading tasks:", error);
            }
        });
    }

    // Initial load of tasks
    loadTasks();

    // Add Task
    $('#add-task-btn').on('click', function() {
        let taskText = $('#task-input').val().trim();
        if (taskText !== '') {
            $.ajax({
                url: 'add_task.php',
                type: 'POST',
                data: { task: taskText },
                success: function(response) {
                    $('#task-input').val(''); // Clear input
                    loadTasks(); // Reload tasks
                },
                error: function(xhr, status, error) {
                    console.error("Error adding task:", error);
                }
            });
        }
    });

    // Mark/Unmark Task as Complete (delegated event)
    $(document).on('change', '.status-checkbox', function() {
        let taskId = $(this).data('id');
        let isCompleted = $(this).is(':checked') ? 1 : 0;
        $.ajax({
            url: 'update_task.php',
            type: 'POST',
            data: { id: taskId, status: isCompleted },
            success: function(response) {
                loadTasks(); // Reload tasks to update UI
            },
            error: function(xhr, status, error) {
                console.error("Error updating task status:", error);
            }
        });
    });

    // Delete Task (delegated event)
    $(document).on('click', '.delete-btn', function() {
        let taskId = $(this).data('id');
        if (confirm('Are you sure you want to delete this task?')) {
            $.ajax({
                url: 'delete_task.php',
                type: 'POST',
                data: { id: taskId },
                success: function(response) {
                    loadTasks(); // Reload tasks
                },
                error: function(xhr, status, error) {
                    console.error("Error deleting task:", error);
                }
            });
        }
    });

    // Edit Task (Optional - for a more advanced version, might involve showing an input field)
    // For now, let's keep it simple. If you want to implement inline editing, you'll need more complex JS.
    // This is just a placeholder for the button.
    $(document).on('click', '.edit-btn', function() {
        alert('Edit functionality not yet implemented. You can expand on this!');
    });
});