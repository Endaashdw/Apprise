<?php
    include("../../includes/mysql_connect.php");
    $teamID = $_GET['id'];

    $delete_query = "DELETE FROM users WHERE user_id = $teamID";
    $result = mysqli_query($conn, $delete_query) or die(mysqli_error($conn));

    if ($result) {
        echo "<script>
            alert('Deleted successfully!');
            window.location.href = '../../team.php';
        </script>";
        exit();
    }
?>
