<?php
include('../db/db.php');
include('../component/header.php');


?>

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="../Action/login_checker.php" method="POST">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="username" id="Username" type="text" placeholder="" />
                                <label for="Username">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                <label for="inputPassword">Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="btn btn-primary" href="">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <?php
                            if(isset($_SESSION['error']))
                            {
                                echo "<div class='alert alert-danger' role='alert'>Invalid username or password</div>";
                            }
                            unset($_SESSION['error']);
                        ?>
                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include('../component/footer.php');
?>