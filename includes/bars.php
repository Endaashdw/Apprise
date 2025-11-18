<?php
  include("Includes/mysql_connect.php");
  session_start();

  $user_id = $_SESSION['user_id'];

  // get all projects that the user is a member of
  $project_query = "
      SELECT p.project_id, p.project_name 
      FROM projects p
      JOIN team_users tu ON p.team_id = tu.team_id
      WHERE tu.user_id = '$user_id'
  ";
  $project_result = mysqli_query($conn, $project_query);
?>

<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Julian Gromea - 11/17/2025 -->
    <a class="navbar-brand fw-bold pe-lg-5" href="#"><img src="Assets/Images/Logos/TextSm.png" alt="text"></a>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" data-bs-backdrop="false" data-bs-scroll="true">
      <div class="offcanvas-header">
        <a class="offcanvas-title px-2 rounded-3 text-decoration-none" id="offcanvasNavbarLabel" href="#"><img src="Assets/Images/Logos/LogoSm.png" alt="logo small"></a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body d-flex flex-column">
        <ul class="navbar-nav justify-content-start flex-grow-1">
          <!-- Static Pages -->
          <li class="nav-item">
            <a class="nav-link mx-1 my-1 ps-2" href="home.php">
              <img src="Assets/Images/Icons/Dashboard.png" alt="Dashboard" width="24" height="24">
              <span>Dashboard</span>
            </a>
          </li>

          <!-- Dynamic Project Links -->
          <?php while ($project = mysqli_fetch_assoc($project_result)) : ?>
          <li class="nav-item">
            <a class="nav-link mx-1 my-1 ps-2" href="projects.php?project_id=<?php echo $project['project_id']; ?>">
              <img src="Assets/Images/Icons/Assignment.png" alt="Project" width="24" height="24">
              <span><?php echo htmlspecialchars($project['project_name']); ?></span>
            </a>
          </li>
          <?php endwhile; ?>

          <!-- Leian Togores - 11/17/2025 -->

          <li class="nav-item">
            <a class="nav-link mx-1 my-1 ps-2" href="Actions/login/logout.php">
              <img src="Assets/Images/Icons/Logout.png" alt="Logout" width="24" height="24">
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
