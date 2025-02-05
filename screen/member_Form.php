<?php
include('../db/db.php');
include('../component/header.php');


// if($_SESSION['user'] == "")
// {
// 	header("Location: login.php");
// }

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
                                echo "Update Member Data";
                            }
                            else
                            {
                                echo "Add Member Data";
                            }
                            ?>    
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="../Action/member_Add-Update.php" method="POST">
                            <?php
                            if($id != null)
                            {
                                $sql = "select * from member where member_id ='$id'";
                                $get = get($sql);
                                $data = $get[0];

                                echo "<input value='".$data['member_id']."' type='hidden' name='id'>";
                            }
                            ?>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="fname" id="fname" type="text" placeholder="Firstname" value="<?php if($data != null)echo $data['member_fname'] ?>"/>
                                        <label for="fname">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="lname" id="lname" type="text" placeholder="Lastname" value="<?php if($data != null)echo $data['member_lname'] ?>"/>
                                        <label for="lname">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="Email" id="" type="text" placeholder="" value="<?php if($data != null)echo $data['member_email'] ?>" />
                                <label for="Email">Email</label>
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
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="Tel" id="Tel" type="tel" placeholder="Phone number" />
                                        <label for="Tel">Tel</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select class="form-select" name="blood_type" id="blood_type" aria-label="Floating label select example">
                                            <option value="<?php if($data != null)echo $data['member_blood_type'] ?>">
                                                
                                            </option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                        <label for="inputUsername">Blood type</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                
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
                            ?>
                                <p class="text-danger">
                                    <?php echo $_SESSION['error']; ?>
                                </p>
                            <?php
                            unset($_SESSION['error']);
                            }
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