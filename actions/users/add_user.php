<?php
    include("../../Includes/mysql_connect.php");
    $email = $_POST['email'];
    $role = strtoupper($_POST['role']);
    $team_id = $_GET['team_id']; // Example: current team ID, replace with actual team/session value

    // Check if the user exists in the users table
    $check_user_query = "
        SELECT user_id 
        FROM users
        WHERE email = '$email'
    ";
    $check_user_result = mysqli_query($conn, $check_user_query);

    if (mysqli_num_rows($check_user_result) > 0) {
        $user = mysqli_fetch_assoc($check_user_result);
        $user_id = $user['user_id'];

        // Check if user is already in this team
        $check_team_query = "
            SELECT * 
            FROM team_users 
            WHERE team_id = '$team_id' 
            AND user_id = '$user_id'
        ";
        $check_team_result = mysqli_query($conn, $check_team_query);

        if (mysqli_num_rows($check_team_result) > 0) {
            // User already in this team
            echo "<script>
                alert('This user is already in your team!');
                window.location.href = '../../team.php?team_id=$team_id';
            </script>";
            exit();
        } else {
            // Add existing user to this team
            $insert_team_user = "
                INSERT INTO team_users (team_id, user_id, role)
                VALUES ('$team_id', '$user_id', '$role')
            ";
            $insert_result = mysqli_query($conn, $insert_team_user);

            if ($insert_result) {
                echo "<script>
                    alert('Existing user added to your team successfully!');
                    window.location.href = '../../team.php?team_id=$team_id';
                </script>";
                exit();
            } else {
                echo "<script>
                    alert('Error adding user to team: " . addslashes($conn->error) . "');
                    window.location.href = '../../team.php?team_id=$team_id';
                </script>";
                exit();
            }
        }
    } else {
        // User not found in users table
        echo "<script>
            alert('User not found. Please ensure they are registered first.');
            window.location.href = '../../team.php?team_id=$team_id';
        </script>";
        exit();
    }
?>
