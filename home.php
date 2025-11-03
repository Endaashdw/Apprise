<?php include("Includes/main_header.php"); ?>
<?php include("Includes/session_data.php"); ?>
<?php include("Includes/bars.php"); ?>

<!-- Kaizen Batang - 10/15/2025 -->
<section class="main min-vh-100 mt-lg-5">
    <?php
        include('Includes/mysql_connect.php');

        $query = "  SELECT projects.*, teams.team_name, users.name AS user_name
                    FROM projects
                    JOIN teams ON projects.team_id = teams.team_id
                    JOIN team_users ON teams.team_id = team_users.team_id
                    JOIN users ON team_users.user_id = users.user_id
                    WHERE users.user_id = '$user_id'
                    ORDER BY projects.created_at ASC;
                ";
    

        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_array($result)) { 
            $project_id = $row['project_id'];
    ?>
    <div class="container min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="row w-100">
            <div class="col-lg-6">
                <div class="dashboard-tile mx-2 p-5 d-flex flex-column justify-content-center align-items-center rounded-3">
                    <h1 class="mt-auto text-uppercase fw-bold"><?php echo $row['project_name'] ?></h1>
                    <div class="row w-100">
                        <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                            <a href="projects.php">
                                <img src="Assets/Images/Icons/Assignment.png" alt="Projects" width="80" height="80">
                            </a>
                        </div>
                        <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                            <a href="team.php">
                                <img src="Assets/Images/Icons/People.png" alt="People" width="80" height="80">
                            </a>
                        </div>
                        <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                            <a href="calendar.php">
                                <img src="Assets/Images/Icons/Calendar.png" alt="Calendar" width="80" height="80">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="dashboard-tile mx-2 p-5 rounded-3">
                    <h1 class="text-uppercase fw-bold">Analytics</h1>
                    <div class="container d-flex flex-column align-items-center justify-content-center">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Created At:</th>
                                    <td><?php echo $row['created_at'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Status:</th>
                                    <td><?php echo $row['status'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Deadline:</th>
                                    <td><?php echo $row['due_date'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Tasks: </th>
                                    <td>
                                        <?php 
                                            $query_total = "SELECT COUNT(*) AS total FROM tasks WHERE project_id = '$project_id'";
                                            $result_total = mysqli_query($conn, $query_total);
                                            $total_tasks = mysqli_fetch_assoc($result_total)['total'];
                                            echo $total_tasks;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Completed:</th>
                                    <td>
                                        <?php 
                                            $query_completed = "SELECT COUNT(*) AS completed FROM tasks WHERE project_id = '$project_id' AND task_status = 'Completed'";
                                            $result_completed = mysqli_query($conn, $query_completed);
                                            $completed_tasks = mysqli_fetch_assoc($result_completed)['completed'];
                                            echo $completed_tasks;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">For Review:</th>
                                    <td>
                                        <?php 
                                            $query_review = "SELECT COUNT(*) AS review FROM tasks WHERE project_id = '$project_id' AND task_status = 'For Review'";
                                            $result_review = mysqli_query($conn, $query_review);
                                            $for_review = mysqli_fetch_assoc($result_review)['review'];
                                            echo $for_review;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Unfinished:</th>
                                    <td>
                                        <?php 
                                            $query_unfinished = "SELECT COUNT(*) AS unfinished 
                                                                FROM tasks 
                                                                WHERE project_id = '$project_id' 
                                                                AND task_status IN ('Incomplete', 'Not Started', 'On Hold')
                                            ";
                                            $unfinished_tasks = mysqli_fetch_assoc(mysqli_query($conn, $query_unfinished))['unfinished'];
                                            echo $unfinished_tasks;
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h1 class="text-uppercase fw-bold"><?php echo $row['description'] ?></h1>
                    <a href="<?php echo $row['documentation_link'] ?>" target="_blank" style="text-align:center">Repository/Documentation</a>
                </div>
            </div>            
        </div>
    </div>
    <?php } ?>
</section>


<?php include("Includes/main_footer.php"); ?>