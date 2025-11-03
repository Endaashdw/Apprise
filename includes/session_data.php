<?php
    // Kaizen Batang - 11/2/2025
    // Checks if user is logged in
    session_start();
    if (empty($_SESSION['logged_in'])) {
        header('Location: /index.php');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    // ---
?>