<?php
    include("../../Includes/mysql_connect.php");

    $teamID = $_GET['team_id'];  // current team
    $userID = $_GET['user_id'];  // user to remove

    $delete_query = "DELETE FROM team_users WHERE team_id = '$teamID' AND user_id = '$userID'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        echo "<script>
            alert('User removed from the team successfully!');
            window.location.href = '../../team.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Error removing user from team: " . addslashes($conn->error) . "');
            window.location.href = '../../team.php';
        </script>";
        exit();
    }
?>
