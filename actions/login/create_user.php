<!-- Kaizen Batang - 11/2/2025 -->

<?php
    include('../../Includes/mysql_connect.php');

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

    $checkEmail = "SELECT email FROM users WHERE email = '$email'";
    $emailResult = mysqli_query($conn, $checkEmail);

    if($emailResult->num_rows > 0) {
        echo "<script>
            alert('Email ID already exists!');
            window.location.href = '../../index.php';
        </script>";
        exit();
    } else {
        $insert_query = "INSERT INTO `users` (`name`, `username`, `email`, `user_password`) VALUES
        ('$name', '$username', '$email', '$user_password');";
        $result = mysqli_query($conn, $insert_query);
    
        if ($result) {
            echo "<script>
                alert('Account created successfully!');
                window.location.href = '../../index.php';
            </script>";
            exit();
        } else {
            echo "<script>
                alert('Error creating account: " . addslashes($conn->error) . "');
                window.location.href = '../../index.php';
            </script>";
            exit();
        }
    }

    $conn->close();
?>