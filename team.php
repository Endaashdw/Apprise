<?php include("main_header.php"); ?>
<!-- Matthew Bibaoco - 10/15/2025 !-->
<div class="d-flex justify-content-center align-items-center vh-100 projects">
    <div class="bg-light rounded shadow w-75">
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
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-danger border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">M</div>
                                <i class="bi bi-three-dots-vertical"></i>
                            </div>
                            Player Movement
                        </td>
                        <td><span class="badge border border-dark status-completed px-3 py-2">COMPLETED</span></td>
                        <td><span class="badge border border-dark category-programming px-3 py-2">PROGRAMMING</span></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-warning border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">J</div>
                                <i class="bi bi-three-dots-vertical"></i>
                            </div>
                            Initial Concept Art
                        </td>
                        <td><span class="badge border border-dark status-completed px-3 py-2">COMPLETED</span></td>
                        <td><span class="badge border border-dark category-assets px-3 py-2">ASSETS/ART</span></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-warning border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">J</div>
                                <div class="rounded-circle bg-info border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">L</div>
                                <i class="bi bi-three-dots-vertical"></i>
                            </div>
                            Final GDD
                        </td>
                        <td><span class="badge border border-dark status-for-review px-3 py-2">FOR REVIEW</span></td>
                        <td><span class="badge border border-dark category-game-design px-3 py-2">GAME DESIGN</span></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-danger border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">M</div>
                                <i class="bi bi-three-dots-vertical"></i>
                            </div>
                            Inventory System
                        </td>
                        <td><span class="badge border border-dark status-for-review px-3 py-2">FOR REVIEW</span></td>
                        <td><span class="badge border border-dark category-programming px-3 py-2">PROGRAMMING</span></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-danger border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">K</div>
                                <i class="bi bi-three-dots-vertical"></i>
                            </div>
                            Initial Player Model
                        </td>
                        <td><span class="badge border border-dark status-incomplete px-3 py-2">INCOMPLETE</span></td>
                        <td><span class="badge border border-dark category-assets px-3 py-2">ASSETS/ART</span></td>
                    </tr>
                    <!-- Add more rows here -->
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<?php include("bars.php"); ?>
<?php include("main_footer.php"); ?>