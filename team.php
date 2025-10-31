<?php include("Includes/main_header.php"); ?>
<!-- Matthew Bibaoco - 10/15/2025 !-->
<div class="d-flex justify-content-center align-items-center vh-100 projects">
    <div class="bg-light rounded shadow w-75 h-75">
        <!-- Header Row -->
        <div class="row align-items-center">
            <div class="col-10 col-md-11">
            <h1 class="m-0">Team Members</h1>
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
                    
                    $select_query = "SELECT * FROM users ORDER BY user_id ASC";
                    $result = mysqli_query($conn, $select_query);
                ?>
                <div class ="col-sm-12">
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Common Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['role'] ?></td>
                                    <td>
                                        <button type="button" class="btn" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editModal"
                                            data-id="<?php echo $row['user_id']; ?>"
                                            data-name="<?php echo htmlspecialchars($row['name']); ?>"
                                            data-email="<?php echo htmlspecialchars($row['email']); ?>"
                                            data-role="<?php echo htmlspecialchars($row['role']); ?>">
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

        <!-- Matthew Bibaoco - 10/31/2025 !-->
        <!-- Modal -->
        <div class="modal fade" id="addModal" onsubmit="return confirm('Are you sure you want to add this user?')" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="Actions/Users/add_user.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role:</label>
                                <input type="text" name="role" class="form-control" required />
                            </div>
                            <button type="submit" class="btn btn-success" >Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="Actions/Users/update_user.php" method="POST">
                            <input type="hidden" name="edit_id" id="edit_id">
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <input type="text" name="edit_name" id="edit_name" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" name="edit_email" id="edit_email" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role:</label>
                                <input type="text" name="edit_role" id="edit_role" class="form-control" required />
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("Includes/bars.php"); ?>
<?php include("Includes/main_footer.php"); ?>
<?php include("Assets/Scripts/update_user.js"); ?>
