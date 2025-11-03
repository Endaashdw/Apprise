<?php
    include("../../Includes/mysql_connect.php");
    $taskID = $_GET['id'];
    $project_id = $_GET['project_id'];

    $delete_query = "DELETE FROM tasks WHERE task_id = $taskID";
    $result = mysqli_query($conn, $delete_query) or die(mysqli_error($conn));

    if ($result) {
        echo "<script>
            alert('Deleted successfully!');
            window.location.href = '../../projects.php?project_id=$project_id';
        </script>";
        exit();
    }
?>
