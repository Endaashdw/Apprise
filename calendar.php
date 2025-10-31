<?php include("includes/main_header.php"); ?>
<!-- Matthew Bibaoco - 10/15/2025 !-->
<div class="d-flex justify-content-center align-items-center vh-100 projects">
    <div class="bg-light rounded shadow w-75 h-75">
        <!-- Header Row -->
        <div class="row align-items-center">
            <div class="col-10 col-md-11">
            <h1 class="m-0">Calendar</h1>
            </div>
            <div class="col-2 col-md-1 d-flex justify-content-center align-items-center">
            <img 
                src="Assets\Images\Icons\Plus.png" 
                alt="Plus" 
                class="img-fluid"
                style="max-width: 32px;"
            >
            </div>
        </div>

        <!-- Project Table -->
        <div class="row justify-content-center mt-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                            <th class="w-25">CATEGORY</th>
                            <th>MESSAGE</th>
                            <th class="w-25">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="badge border border-dark category-programming px-3 py-2">PROGRAMMING</span></td>
                                <td>
                                    <div class="row g-0">
                                        <div class="col-md-2 d-none d-md-block">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle bg-danger border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">M</div>
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-10">
                                            Magnus C. has updated the status of Inventory System to:
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge border border-dark status-for-review px-3 py-2">FOR REVIEW</span></td>
                            </tr>
                            <tr>
                                <td><span class="badge border border-dark category-game-design px-3 py-2">GAME DESIGN</span></td>
                                <td>
                                    <div class="row g-0">
                                        <div class="col-md-2 d-none d-md-block">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle bg-info border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">L</div>
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-10">
                                            Leonardo D. has updated the status of Initial Concept Art to:
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge border border-dark status-completed px-3 py-2">COMPLETED</span></td>
                            </tr>
                            <tr>
                                <td><span class="badge border border-dark category-assets px-3 py-2">ASSETS/ART</span></td>
                                <td>
                                    <div class="row g-0">
                                        <div class="col-md-2 d-none d-md-block">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle bg-warning border border-dark text-white text-center fw-bold" style="width:30px;height:30px;line-height:30px;">J</div>
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-10">
                                            Jordan M. added task: Enemy Concept Art
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <!-- Add more rows here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/bars.php"); ?>
<?php include("includes/main_footer.php"); ?>