<?php
include("../../Includes/mysql_connect.php");

if (isset($_POST['edit_id'])) {
    $user_id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $role = strtoupper($_POST['edit_role']); // uppercase role
    $team_id = 1; 

    $update_user = "
        UPDATE users 
        SET name = '$name',
            username = '$name'
        WHERE user_id = '$user_id'
    ";
    mysqli_query($conn, $update_user);

    // Update the role
    $update_role = "
        UPDATE team_users 
        SET role = '$role' 
        WHERE user_id = '$user_id' AND team_id = '$team_id'
    ";
    $result = mysqli_query($conn, $update_role);

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
