<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "apprise_db";

    $conn = mysqli_connect($host, $user, $pass);
    $db = mysqli_select_db($conn, $dbname) or die(mysqli_error($conn));
?>