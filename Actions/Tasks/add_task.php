<!-- Matthew Bibaoco - 11/04/2025-->
<?php
    include("../../Includes/mysql_connect.php");
    $project_id = $_POST['project_id'];
    $task_name = $_POST['task_name'];
    $task_status = $_POST['task_status'];
    $description = $_POST['description'];
    $category = strtoupper($_POST['category']);
    $due_date = $_POST['due_date'];
    $assignee = $_POST['assignee'];

    $insert_query = "INSERT INTO `tasks` (`project_id`, `user_id`, `task_name`, `task_status`, `description`, `category`, `due_date`) VALUES
    ('$project_id', '$assignee', '$task_name', '$task_status', '$description', '$category', '$due_date');";
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        echo "<script>
            alert('New task added successfully!');
            window.location.href = '../../projects.php?project_id=$project_id';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Error adding task: " . addslashes($conn->error) . "');
            window.location.href = '../../projects.php?project_id=$project_id';
        </script>";
        exit();
    }
?>