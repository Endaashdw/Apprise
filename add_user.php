<?php
    include("mysql_connect.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $insert_query = "INSERT INTO `users` (`team_id`, `name`, `email`, `username`, `user_password`, `role`) VALUES
(1, '$name', '$email', '$name', '$password', '$role');";
    $result = mysqli_query($conn, $insert_query);

    if($result)
    {
        echo "NEW MEMBER ADDED SUCCESSFULLY";
    }
    else
    {
        echo "ERROR: ", $conn->error;
    }

    $conn->close();

?>

<br><a href="team.php">VIEW ALL MEMBERS</a>