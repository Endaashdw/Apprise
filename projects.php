<?php include("Includes/main_header.php"); ?>
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
            <!--
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>TASK</th>
                                <th>STATUS</th>
                                <th>CATEGORY</th>
                                <th>ASSIGNEE(S)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Player Movement</td>
                                <td><span class="badge border border-dark status-completed px-3 py-2">COMPLETED</span></td>
                                <td><span class="badge border border-dark category-programming px-3 py-2">PROGRAMMING</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-danger border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">M</div>
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Initial Concept Art</td>
                                <td><span class="badge border border-dark status-completed px-3 py-2">COMPLETED</span></td>
                                <td><span class="badge border border-dark category-assets px-3 py-2">ASSETS/ART</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-warning border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">J</div>
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Final GDD</td>
                                <td><span class="badge border border-dark status-for-review px-3 py-2">FOR REVIEW</span></td>
                                <td><span class="badge border border-dark category-game-design px-3 py-2">GAME DESIGN</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-warning border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">J</div>
                                        <div class="rounded-circle bg-info border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">L</div>
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Inventory System</td>
                                <td><span class="badge border border-dark status-for-review px-3 py-2">FOR REVIEW</span></td>
                                <td><span class="badge border border-dark category-programming px-3 py-2">PROGRAMMING</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-danger border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">M</div>
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Initial Player Model</td>
                                <td><span class="badge border border-dark status-incomplete px-3 py-2">INCOMPLETE</span></td>
                                <td><span class="badge border border-dark category-assets px-3 py-2">ASSETS/ART</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-danger border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">K</div>
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </div>
                                </td>
                            </tr>
                            Add more rows here
                        </tbody>
                    </table>
                </div>
            </div>
            !-->

            <div class="col-12">
                <!-- Matthew Bibaoco - 10/28/2025 !-->
                <?php
                    include('Includes/mysql_connect.php');
                    $project_id = 1; // stored when the user logs in
                    
                    $select_query = "SELECT tasks.*, users.name 
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
                                <th style="width: 25%;">Task</th>
                                <th style="width: 10%;">Status</th>
                                <th style="width: 20%;">Category</th>
                                <th style="width: 20%;">Deadline</th>
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
                                    <td><?php echo $row['due_date'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td>
                                        <button type="button" class="btn">
                                        <img 
                                            src="Assets\Images\Icons\Edit.png" 
                                            alt="Edit" 
                                            class="img-fluid"
                                            style="max-width: 32px;"
                                        >
                                        </button>
                                        <a href="actions\users\delete_user.php?id=<?php echo $row['user_id']?>" onclick="return confirm('Are you sure you want to delete this item?');">
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
        </div>
    </div>
</div>
<?php include("Includes/bars.php"); ?>
<?php include("Includes/main_footer.php"); ?>