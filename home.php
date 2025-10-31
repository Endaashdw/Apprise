<?php include("Includes/main_header.php"); ?>
<?php include("Includes/bars.php"); ?>

<!-- Kaizen Batang - 10/15/2025 -->
<section class="main min-vh-100 mt-lg-5">
    <div class="container min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="row w-100">
            <div class="col-lg-6">
                <div class="dashboard-tile mx-2 p-5 d-flex flex-column justify-content-center align-items-center rounded-3">
                    <h1 class="mt-auto text-uppercase fw-bold">Project 1</h1>
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
                                <th scope="row">Deadline:</th>
                                <td>Date</td>
                            </tr>
                            <tr>
                                <th scope="row">Total Tasks:</th>
                                <td>Number</td>
                            </tr>
                            <tr>
                                <th scope="row">Completed:</th>
                                <td>Number</td>
                            </tr>
                            <tr>
                                <th scope="row">For Review:</th>
                                <td>Number</td>
                            </tr>
                            <tr>
                                <th scope="row">Unfinished:</th>
                                <td>Number</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>


<?php include("Includes/main_footer.php"); ?>