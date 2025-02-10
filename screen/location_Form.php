<?php
include('../db/db.php');
authen();
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
                                echo "Update Location Data";
                            }
                            else
                            {
                                echo "Add Location Data";
                            }
                            ?>    
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="../Action/location_Add-Update.php" method="POST">
                            <?php
                            if($id != null)
                            {
                                $sql = "select * from Location where Location_id ='$id'";
                                $get = get($sql);
                                $data = $get[0];

                                echo "<input value='".$data['location_id']."' type='hidden' name='id'>";
                            }
                            ?>
                            

                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" id="" type="text" placeholder="" value="<?php if($data != null)echo $data['location_name'] ?>" />
                                <label for="inputName">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea rows="6" class="form-control" style="height:100%;"  name="detail" id="" type="text" placeholder="" value="" ><?=$data['location_detail']??'' ?></textarea>
                                <label for="inputDetail">Detail</label>
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