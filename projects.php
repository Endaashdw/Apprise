<?php include("Includes/main_header.php"); ?>
<?php include("Includes/session_data.php"); ?>
<?php include("Includes/bars.php"); ?>

<!-- Matthew Bibaoco - 10/15/2025-->
<div class="d-flex justify-content-center align-items-center vh-100 projects">
    <div class="bg-light rounded shadow w-75 h-75">
        <!-- Header Row -->
        <div class="row align-items-center">
            <div class="col-10 col-md-11">
            <h1 class="m-0">Projects</h1>
            </div>
            <div class="col-2 col-md-1 d-flex justify-content-center align-items-center">
                <!-- Trigger Button -->
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addModal">
                    <img 
                        src="Assets\Images\Icons\Plus.png" 
                        alt="Plus" 
                        class="img-fluid"
                        style="max-width: 32px;"
                    >
                </button>
            </div>
        </div>

        <!-- Project Table -->
        <div class="row justify-content-center mt-3">
            <div class="col-12">
                <!-- Matthew Bibaoco - 10/28/2025 !-->
                <?php
                    include('Includes/mysql_connect.php');
                    $project_id = $_GET['project_id']; // stored when the user logs in
                    
                    $select_query = "SELECT tasks.*, users.username AS user_name
                                    FROM tasks 
                                    JOIN users ON tasks.user_id = users.user_id 
                                    WHERE tasks.project_id = '$project_id'
                                    ORDER BY tasks.due_date ASC;
                                ";
                    $result = mysqli_query($conn, $select_query);
                ?>
                <div class ="col-sm-12">
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Task</th>
                                <th style="width: 10%;">Status</th>
                                <th style="width: 30%;">Description</th>
                                <th style="width: 10%;">Category</th>
                                <th style="width: 15%;">Deadline</th>
                                <th style="width: 15%;">Assignee</th>
                                <th style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?php echo $row['task_name'] ?></td>
                                    <td><?php echo $row['task_status'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td><?php echo $row['category'] ?></td>
                                    <td><?php echo $row['due_date'] ?></td>
                                    <td><?php echo $row['user_name'] ?></td>
                                    <td>
                                        <button type="button" class="btn" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editModal"
                                            data-id="<?php echo $row['task_id']; ?>"
                                            data-name="<?php echo htmlspecialchars($row['task_name']); ?>"
                                            data-status="<?php echo htmlspecialchars($row['task_status']); ?>"
                                            data-description="<?php echo $row['description']; ?>"
                                            data-category="<?php echo htmlspecialchars($row['category']); ?>"
                                        >
                                        <img 
                                            src="Assets\Images\Icons\Edit.png" 
                                            alt="Edit" 
                                            class="img-fluid"
                                            style="max-width: 32px;"
                                        >
                                        </button>
                                        <a href="Actions\Tasks\delete_task.php?id=<?php echo $row['task_id']?>&project_id=<?php echo $project_id ?>" onclick="return confirm('Are you sure you want to delete this task?');">
                                            <img 
                                                src="Assets\Images\Icons\Delete.png" 
                                                alt="Delete" 
                                                class="img-fluid"
                                                style="max-width: 32px;"
                                            >
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addModal" onsubmit="return confirm('Are you sure you want to add this task?')" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userModalLabel">Add New Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="Actions/Tasks/add_task.php" method="POST">
                                <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                                <div class="mb-3">
                                    <label class="form-label">Task:</label>
                                    <input type="text" name="task_name" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status:</label>
                                    <select name="task_status" class="form-select" required>
                                        <option value="">Select status</option>
                                        <option value="Incomplete">Incomplete</option>
                                        <option value="For Review">For Review</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Not Started">Not Started</option>
                                        <option value="On Hold">On Hold</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description:</label>
                                    <input type="text" name="description" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category:</label>
                                    <input type="text" name="category" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deadline:</label>
                                    <input type="datetime-local" name="due_date" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Assignee:</label>
                                    <select name="assignee" class="form-select" required>
                                        <option value="">-- Select Member --</option>
                                        <?php 
                                            // run a new query for project members
                                            $team_query = "
                                                SELECT u.user_id, u.name 
                                                FROM users u
                                                JOIN team_users tu ON u.user_id = tu.user_id
                                                WHERE tu.team_id = (
                                                    SELECT team_id FROM projects WHERE project_id = '$project_id'
                                                )
                                            ";
                                            $team_result = mysqli_query($conn, $team_query);

                                            // loop through the team members
                                            while ($member = mysqli_fetch_assoc($team_result)): 
                                        ?>
                                        <option value="<?php echo htmlspecialchars($member['user_id']); ?>">
                                            <?php echo htmlspecialchars($member['name']); ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <!-- Julian Gromea - 11/17/2025 -->
                                <button type="submit" class="btn btn-purple" >Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editModal" onsubmit="return confirm('Are you sure you want to edit this task?')" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userModalLabel">Edit Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="Actions/Tasks/update_task.php?project_id=<?php echo $project_id?>" method="POST">
                                <input type="hidden" name="task_id" id="task_id">
                                <div class="mb-3">
                                    <label class="form-label">Task:</label>
                                    <input type="text" name="task_name" id="task_name" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status:</label>
                                    <select name="task_status" id="task_status" class="form-select" required>
                                        <option value="">Select status</option>
                                        <option value="Incomplete">Incomplete</option>
                                        <option value="For Review">For Review</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Not Started">Not Started</option>
                                        <option value="On Hold">On Hold</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description:</label>
                                    <input type="text" name="description" id="description" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category:</label>
                                    <input type="text" name="category" id="category" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deadline:</label>
                                    <input type="datetime-local" name="due_date" class="form-control" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Assignee:</label>
                                    <select name="assignee" class="form-select" id="assignee" required>
                                        <option value="">-- Select Member --</option>
                                        <?php 
                                            // run a new query for project members
                                            $team_query = "
                                                SELECT u.user_id, u.name 
                                                FROM users u
                                                JOIN team_users tu ON u.user_id = tu.user_id
                                                WHERE tu.team_id = (
                                                    SELECT team_id FROM projects WHERE project_id = '$project_id'
                                                )
                                            ";
                                            $team_result = mysqli_query($conn, $team_query);

                                            // loop through the team members
                                            while ($member = mysqli_fetch_assoc($team_result)): 
                                        ?>
                                        <option value="<?php echo htmlspecialchars($member['user_id']); ?>">
                                            <?php echo htmlspecialchars($member['name']); ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <!-- Julian Gromea - 11/17/2025 -->
                                <button type="submit" class="btn btn-purple" >Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("Includes/main_footer.php"); ?>
<script><?php include("Assets/Scripts/update_task.js"); ?></script>