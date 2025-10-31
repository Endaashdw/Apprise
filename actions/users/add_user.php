<?php
    include("../../includes/mysql_connect.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = strtoupper($_POST['role']);

    $insert_query = "INSERT INTO `users` (`team_id`, `name`, `email`, `username`, `user_password`, `role`) VALUES
(1, '$name', '$email', '$name', '$password', '$role');";
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        echo "<script>
            alert('New member added successfully!');
            window.location.href = 'team.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Error adding member: " . addslashes($conn->error) . "');
            window.location.href = 'team.php';
        </script>";
        exit();
    }

    $conn->close();

?>

<br><a href="../../team.php">VIEW ALL MEMBERS</a>