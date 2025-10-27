<?php include("main_header.php"); ?>
<!-- Matthew Bibaoco - 10/15/2025 !-->
<div class="d-flex justify-content-center align-items-center vh-100 projects">
    <div class="bg-light rounded shadow w-75 h-75">
        <!-- Header Row -->
        <div class="row align-items-center">
            <div class="col-10 col-md-11">
            <h1 class="m-0">Team Members</h1>
            </div>
            <div class="col-2 col-md-1 d-flex justify-content-center align-items-center">
            <img 
                src="Images/Icons/Plus.png" 
                alt="Plus" 
                class="img-fluid"
                style="max-width: 32px;"
            >
            </div>
        </div>

        <!-- Project Table -->
        <div class="row justify-content-center mt-3">
            <div class="col-12">
                <!--
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                            <th>MEMBER</th>
                            <th>COMMON ROLE</th>
                            <th>TASK PROGRESS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="row g-0">
                                        <div class="col-md-2 d-none d-md-block">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle bg-danger border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">M</div>
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-10">
                                            Magnus C.
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge border border-dark category-programming px-3 py-2">PROGRAMMING</span></td>
                                <td>2/3</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row g-0">
                                        <div class="col-md-2 d-none d-md-block">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle bg-warning border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">J</div>
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-10">
                                            Jordan M.
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge border border-dark category-assets px-3 py-2">ASSETS/ART</span></td>
                                <td>1/3</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row g-0">
                                        <div class="col-md-2 d-none d-md-block">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle bg-info border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">L</div>
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-10">
                                            Leonardo D.
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge border border-dark category-game-design px-3 py-2">GAME DESIGN</span></td>
                                <td>2/3</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row g-0">
                                        <div class="col-md-2 d-none d-md-block">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle bg-danger border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">K</div>
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-10">
                                            Keanu R.
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge border border-dark category-programming px-3 py-2">PROGRAMMING</span></td>
                                <td>2/3</td>
                            </tr>
                            Add more rows here
                        </tbody>
                    </table>
                </div>
                !-->
                <?php
                    include('mysql_connect.php');
                    
                    $select_query = "SELECT * FROM users ORDER BY user_id ASC";
                    $result = mysqli_query($conn, $select_query);
                ?>
                <div class ="col-sm-12">
                    <h1>Libary Books Available</h1>
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Common Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['role'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class ="col-sm-12">
                    <form action="add_user.php" method="POST">
                        Name: <input type="text" name="name" />
                        Email: <input type="text" name="email" />
                        Password: <input type="text" name="password" />
                        Role: <input type="text" name="role" />
                        <input type="submit" value="Add" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("bars.php"); ?>
<?php include("main_footer.php"); ?>