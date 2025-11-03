<!-- Kaizen Batang - 11/3/2025 -->

<?php
    include("../../Includes/mysql_connect.php");
    include("../../Includes/session_data.php");

    $team_select = $_POST['team_select'] ?? '';
    $project_name = trim($_POST['project_name'] ?? '');
    $project_desc = trim($_POST['project_description'] ?? '');
    $project_due = $_POST['due_date'] ?? '';
    $project_url = $_POST['documentation_link'] ?? '';


    $errors = [];
    if ($project_name === '') {
        $errors[] = "Project name is required.";
    }

    $team_id = null;

    if ($team_select === '__new') {
        $new_team_name = trim($_POST['new_team_name'] ?? '');
        $new_team_description = trim($_POST['new_team_description'] ?? '');
        if ($new_team_name === '') {
            $errors[] = "New team name is required.";
        }

        if (empty($errors)) {
            mysqli_begin_transaction($conn);

            $insert_team_query = "INSERT INTO teams (team_name, description, created_at) VALUES
            ('$new_team_name', '$new_team_description', NOW());";
            $team_result = mysqli_query($conn, $insert_team_query);
            if ($team_result) {
                $team_id = mysqli_insert_id($conn);

                $default_role = 'OWNER';
                $insert_team_user_query = "INSERT INTO team_users (team_id, user_id, role) VALUES (" . (int)$team_id . " , " . (int)$user_id . ", '$default_role');";
                $team_user_result = mysqli_query($conn, $insert_team_user_query);
                if (!$team_user_result) {
                    $errors[] = 'Failed to add user to team: ' . mysqli_error($conn);
                    mysqli_rollback($conn);
                } else {
                    mysqli_commit($conn);
                }
            } else {
                $errors[] = 'Failed to create team: ' . mysqli_error($conn);
                mysqli_rollback($conn);
            }
        }
    } else {
        $team_id = (int)$team_select;
        if ($team_id <= 0) {
            $errors[] = "Invalid team selection.";
        }
    }

    if (empty($errors)) {
        $insert_project_query = "INSERT INTO projects (project_name, description, documentation_link, due_date, team_id, created_at) VALUES ('$project_name', '$project_desc', '$project_url', '$project_due', " . (int)$team_id . ", NOW())";
        $insert_project_result = mysqli_query($conn, $insert_project_query);
        if (!$insert_project_result) {
            $errors[] = 'Failed to create project: ' . mysqli_error($conn);
        } else {
            $new_project_id = mysqli_insert_id($conn);
            header("Location: /Apprise/home.php");
            exit;
        }
    }

    $_SESSION['form_errors'] = $errors;
    header("Location: /Apprise/home.php");
    exit();
?>