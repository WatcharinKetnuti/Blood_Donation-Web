<?php
include('../db/db.php');
authen();
if(login_data('admin_level') != 'A')
{
    header("Location: ../screen/index.php");
}
include('../component/header.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;
$data = null;
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">
                            <?php
                            if($id != null)
                            {
                                echo "Update Admin Account";
                            }
                            else
                            {
                                echo "Add Admin Account";
                            }
                            ?>    
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="../Action/admin_Add-Update.php" method="POST">
                            <?php
                            if($id != null)
                            {
                                $sql = "select * from admin where admin_id ='$id'";
                                $get = get($sql);
                                $data = $get[0];

                                echo "<input value='".$data['admin_id']."' type='hidden' name='id'>";
                            }
                            ?>
                            

                            <div class="form-floating mb-3">
                                <input class="form-control" name="username" id="" type="text" placeholder="" value="<?php if($data != null)echo $data['admin_username'] ?>" />
                                <label for="inputUsername">Username</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Create a password" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="confirm-password" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="adminLevel" id="inputLevel" aria-label="Floating label select example">
                                    <option value="<?php if($data != null)echo $data['admin_level'] ?>">
                                        <?php if($data != null)
                                        {
                                            if($data['admin_level'] == 'A')
                                            {
                                                echo "Administrator";
                                            }
                                            else
                                            {
                                                echo "Schedule Manager";
                                            }
                                        }
                                        ?>
                                    </option>
                                    <option value="A">Administrator</option>
                                    <option value="M">Schedule Manager</option>
                                </select>
                                <label for="inputUsername">Admin Level</label>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn add-btn btn-block" type="submit" href="">
                                    <?php
                                        if($id != null)
                                        {
                                            echo "Update";
                                        }
                                        else
                                        {
                                            echo "Add";
                                        }
                                    ?>  
                                </button></div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small">
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo "<div class='alert alert-danger' role='alert'>{$_SESSION['error']}</div>";
                            }
                            unset($_SESSION['error']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

include('../component/footer.php');
?>