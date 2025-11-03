<?php include("Includes/main_header.php"); ?>
<?php include("Includes/session_data.php"); ?>
<?php include("Includes/bars.php"); ?>

<!-- Kaizen Batang - 10/15/2025 -->
<section class="main min-vh-100 mt-lg-5">
    <div class="container min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <?php
            include('Includes/mysql_connect.php');

            $query = "  SELECT projects.*, teams.team_name, teams.team_id AS team_id, users.name AS user_name
                        FROM projects
                        JOIN teams ON projects.team_id = teams.team_id
                        JOIN team_users ON teams.team_id = team_users.team_id
                        JOIN users ON team_users.user_id = users.user_id
                        WHERE users.user_id = '$user_id'
                        ORDER BY projects.created_at ASC;
                    ";

            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $project_id = $row['project_id'];
                ?>
                <div class="row w-100 my-5">
                    <div class="col-lg-6">
                        <div class="dashboard-tile mx-2 p-5 d-flex flex-column justify-content-center align-items-center rounded-3">
                            <h1 class="mt-auto text-uppercase fw-bold"><?php echo $row['project_name'] ?></h1>
                            <div class="row w-100">
                                <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                                    <a href="projects.php?project_id=<?php echo $row['project_id']?>">
                                        <img src="Assets/Images/Icons/Assignment.png" alt="Projects" width="80" height="80">
                                    </a>
                                </div>
                                <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                                    <a href="team.php?team_id=<?php echo $row['team_id']?>">
                                        <img src="Assets/Images/Icons/People.png" alt="People" width="80" height="80">
                                    </a>
                                </div>
                                <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                                    <a href="calendar.php?project_id=<?php echo $row['project_id']?>">
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
            <?php
                }
                } else {
            ?>
                <div class="d-flex justify-content-center align-items-center vh-100">
                        <h1>No projects found for your account.</h1>
                </div>
        <?php } ?>
        <div class="position-fixed bottom-0 end-0 p-3 m-5" style="z-index:1080;">
            <button type="button" class="btn btn-primary btn-lg rounded-circle" data-bs-toggle="modal" data-bs-target="#addProjectModal" style="width:66px; height:66px;">
                <img 
                    src="Assets\Images\Icons\Plus.png" 
                    alt="Plus"
                    class="img-fluid"
                    style="max-width: 32px;"
                >
            </button>
        </div>              
    </div>
</section>

<!-- Kaizen Batang - 11/3/2025 -->
<!-- Add Project Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="Actions/dashboard/create_project.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProjectModalLabel">Make a new project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="project_name" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="project_name" name="project_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="project_description" class="form-label">Project Description</label>
                        <textarea name="project_description" id="project_description" class="form-control" rows="2"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="documentation_link" class="form-label">Documentation URL</label>
                        <input type="url" class="form-control" id="documentation_link" name="documentation_link">
                    </div>

                    <div class="mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="datetime-local" name="due_date" id="due_date" class="form-control" required>
                    </div>

                    <div class="my-3">
                        <h3>Team Assignment</h3>
                    </div>
                    
                    <div class="mb-3">
                        <label for="team_select" class="form-label">Select a Team for this Project</label>
                        <select class="form-select" name="team_select" id="team_select" required>
                            <option value="" selected disabled>Select a team</option>
                            <?php 
                                $team_query = "
                                    SELECT teams.team_id, teams.team_name
                                    FROM teams
                                    JOIN team_users ON teams.team_id = team_users.team_id
                                    WHERE team_users.user_id='$user_id'
                                    ORDER BY teams.team_name ASC
                                ";
                                $team_result = mysqli_query($conn, $team_query);
                                while ($team_row = mysqli_fetch_array($team_result)) {
                                    echo "<option value='" . $team_row['team_id'] . "'>" . htmlspecialchars($team_row['team_name']) . "</option>";
                                }
                            ?>
                            <option value="__new">Create a New Team</option>
                        </select>
                    </div>

                    <div id="new_team_fields" class="d-none">
                        <div class="mb-3">
                            <label for="new_team_name" class="form-label">New Team Name</label>
                            <input type="text" id="new_team_name" name="new_team_name" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label for="new_team_description" class="form-label">New Team Description</label>
                            <textarea name="new_team_description" id="new_team_description" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                    
                    <div class="mb-3 d-flex flex-column align-items-end">
                        <button type="submit" class="btn btn-success">Create Project</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("Includes/main_footer.php"); ?>
<script><?php include("Assets/Scripts/add_project_modal.js"); ?></script>