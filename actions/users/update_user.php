<?php
    include("../../Includes/mysql_connect.php");

    if (isset($_POST['edit_id'])) {
        $id = $_POST['edit_id'];
        $name = $_POST['edit_name'];
        $email = $_POST['edit_email'];
        $role = strtoupper($_POST['edit_role']); // uppercase role

        // Update query
        $sql_update = "UPDATE users 
                       SET name = '$name', 
                           username = '$name', 
                           email = '$email', 
                           role = '$role' 
                       WHERE user_id = '$id'";

        $result = mysqli_query($conn, $sql_update);

        if ($result) {
            echo "<script>
                alert('Member updated successfully!');
                window.location.href = '../../team.php';
            </script>";
            exit();
        } else {
            echo "<script>
                alert('Error updating member: " . addslashes($conn->error) . "');
                window.location.href = '../../team.php';
            </script>";
            exit();
        }
    }
?>
