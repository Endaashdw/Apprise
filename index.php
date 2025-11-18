<?php include("Includes/main_header.php"); ?>

<!-- Kaizen Batang - 11/2/2025 -->
<section class="login min-vh-100">
    <div class="container min-vh-100">
        <?php
            session_start();
            $login_error = $_SESSION['login_error'] ?? '';
            unset($_SESSION['login_error']);
        ?>
        <?php if ($login_error): ?>
            <div class="position-fixed top-0 end-0 p-3" style="z-index:1080;">
                <div id="loginToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true" style="background-color:#dc3545;">
                    <div class="d-flex">
                        <div class="toast-body"><?php echo htmlspecialchars($login_error, ENT_QUOTES); ?></div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                var t = new bootstrap.Toast(document.getElementById('loginToast'), { delay: 4000 });
                t.show();
                });
            </script>
        <?php endif; ?>            

        <div class="row w-100">
            <!-- Julian Gromea - 11/17/2025 -->
            <div class="col-6 min-vh-100 d-flex flex-column justify-content-center align-items-center">
                <img src="Assets/Images/Logos/LogoText.png"" alt="Apprise Logo with text">
            </div>
            <div class="col-6 min-vh-100 d-flex flex-column justify-content-center">
                <form id="loginForm" action="Actions/login/authenticate.php" method="POST" class="w-100">
                    <div class="mb-3">
                        <label for="login_email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" required>
                    </div>

                    <div class="mb-3">
                        <label for="login_password" class="form-label">Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control form-control-lg" required>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-purple btn-lg w-100" data-bs-toggle="modal" data-bs-target="#registerModal">
                                Register
                            </button>
                        </div>
                    
                        <div class="col-6">
                            <button type="submit" class="btn btn-purple btn-lg w-100">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modial-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register new User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="Actions/login/create_user.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">
                                <i class="fa fa-user"></i>
                                User Name
                            </label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="fa fa-user"></i> 
                                Full Name
                            </label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fa fa-envelope"></i>
                                Email Address
                            </label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="user_password" class="form-label">
                                <i class="fa fa-lock"></i>
                                Password
                            </label>
                            <input type="password" class="form-control" id="user_password" name="user_password" required>
                        </div>
                        <!-- Julian Gromea - 11/17/2025 -->
                        <div class="mb-3 d-flex flex-column align-items-end">
                            <button type="submit" class="btn btn-purple">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("Includes/main_footer.php"); ?>