<!-- Kaizen Batang - 11/2/2025 -->

<?php 
    session_start();
    include("../../Includes/mysql_connect.php");

    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['user_password'] ?? '');

    if ($email === '' || $password === '') {
        $_SESSION['login_error'] = 'Please provide email and password.';
        header('Location: ../../index.php');
        exit;
    }

    $authenticate_query = "SELECT user_id, name, username, email, user_password FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $authenticate_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $db_hash = $row['user_password'];
    
        if (password_verify($password, $db_hash)) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['logged_in'] = true;

            mysqli_free_result($result);
            $conn->close();

            header('Location: ../../home.php');
        } else {
            $_SESSION['login_error'] = 'Invalid credentials.';
        }
    } else {
        $_SESSION['login_error'] = 'Invalid credentials.';
    }

    if ($result) {
        mysqli_free_result($result);
    }
    $conn->close();
    
    header('Location: ../../index.php');
    exit;
?>