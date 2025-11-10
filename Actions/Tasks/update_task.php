<?php
include("../../Includes/mysql_connect.php");

if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $task_status = $_POST['task_status'];
    $description = $_POST['description'];
    $category = strtoupper($_POST['category']); // uppercase role
    $due_date = $_POST['due_date']; 
    $assignee = $_POST['assignee']; 
    $project_id = $_GET['project_id'];

    $update_user = "
        UPDATE tasks 
        SET task_name = '$task_name',
            description = '$description',
            category = '$category',
            task_status = '$task_status',
            due_date = '$due_date',
            user_id = '$assignee'
        WHERE task_id = '$task_id'
    ";
    mysqli_query($conn, $update_user);
    $result = mysqli_query($conn, $update_user);

    if ($result) {
        echo "<script>
            alert('Task updated successfully!');
            window.location.href = '../../projects.php?project_id=$project_id';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Error updating task: " . addslashes($conn->error) . "');
            window.location.href = '../../projects.php?project_id=$project_id';
        </script>";
        exit();
    }
}
?>
