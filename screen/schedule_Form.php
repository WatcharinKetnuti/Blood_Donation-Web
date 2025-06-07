<?php
include('../db/db.php');
authen();
include('../component/header.php');


$id = isset($_GET['id']) ? $_GET['id'] : null;
$data = null;
$A = null;
$B = null;
$AB = null;
$O = null;
$ARh = null;
$ARh = null;
$BRh = null;
$BRh = null;
$ORh = null;
$ORh = null;
$ABRh = null;
$ABRh = null;
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
                                echo "Update Schedule Data";
                            }
                            else
                            {
                                echo "Add Schedule Data";
                            }
                            ?>    
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="../Action/schedule_Add-Update.php" method="POST">
                            <?php
                            if($id != null)
                            {
                                $sql = "SELECT * FROM schedule left join location on schedule.location_id = location.location_id where schedule_id ='$id'";
                                $get = get($sql);
                                $data = $get[0];

                                echo "<input value='".$data['schedule_id']."' type='hidden' name='id'>";
                                echo "<input value='".$data['admin_id']."' type='hidden' name='admin_id'>";

                                $blood = explode(",",$data['schedule_blood_type']);
                                $A = in_array("A",$blood) ;
                                $B = in_array("B",$blood) ;
                                $AB = in_array("AB",$blood) ;
                                $O = in_array("O",$blood) ;
                                $ARh = in_array("ARh+",$blood) ;
                                $ARh = in_array("ARh-",$blood) ;
                                $BRh = in_array("BRh+",$blood) ;
                                $BRh = in_array("BRh-",$blood) ;
                                $ORh = in_array("ORh+",$blood) ;
                                $ORh = in_array("ORh-",$blood) ;
                                $ABRh = in_array("ABRh+",$blood) ;
                                $ABRh = in_array("ABRh-",$blood) ;
                            }
                            else
                            {
                                echo "<input value='".login_data('admin_id')."' type='hidden' name='admin_id'>";
                            }
                            ?>
                            

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="StartDate" id="StartDate" type="date" placeholder="Start Date" value="<?=$data['schedule_start_date']??''?>"/>
                                        <label for="StartDate">Start Date</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="EndDate" id="EndDate" type="date" placeholder="End Date" value="<?=$data['schedule_end_date']??''?>" />
                                        <label for="EndDate">End Date</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="StartTime" id="StartTime" type="time" placeholder="Start Time" value="<?=$data['schedule_start_time']??'' ?>" />
                                        <label for="StartTime">Start Time</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="EndTime" id="EndTime" type="time" placeholder="End Time" value="<?=$data['schedule_end_time']??''?>"/>
                                        <label for="EndTime">End Time</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea rows="6" class="form-control" style="height:100%;"  name="detail" id="" type="text" placeholder=""  ><?=$data['schedule_detail']??''?></textarea>
                                <label for="inputDetail">Detail</label>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <div class="dropdown">
                                            <button class="form-select " type="button" id="bloodTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                Blood type
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="bloodTypeDropdown">
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="blood_type[]" value="A" <?= $A? 'checked' : '' ?>>
                                                        <label class="form-check-label">A</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="blood_type[]" value="B" <?= $B? 'checked' : '' ?>>
                                                        <label class="form-check-label">B</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="blood_type[]" value="AB" <?= $AB? 'checked' : '' ?>>
                                                        <label class="form-check-label">AB</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="blood_type[]" value="O" <?= $O? 'checked' : '' ?>>
                                                        <label class="form-check-label">O</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="blood_type[]" value="ARh+" <?= $ARh? 'checked' : '' ?>>
                                                        <label class="form-check-label">ARh+</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="blood_type[]" value="BRh+" <?= $BRh? 'checked' : '' ?>>
                                                        <label class="form-check-label">BRh+</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="blood_type[]" value="ORh+" <?= $ORh? 'checked' : '' ?>>
                                                        <label class="form-check-label">ORh+</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="blood_type[]" value="ABRh+" <?= $ABRh? 'checked' : '' ?>>
                                                        <label class="form-check-label">ABRh+</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="blood_type[]" value="ARh-" <?= $ARh? 'checked' : '' ?>>
                                                        <label class="form-check-label">ARh-</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="blood_type[]" value="BRh-" <?= $BRh? 'checked' : '' ?>>
                                                        <label class="form-check-label">BRh-</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="blood_type[]" value="ORh-" <?= $ORh? 'checked' : '' ?>>
                                                        <label class="form-check-label">ORh-</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="blood_type[]" value="ABRh-" <?= $ABRh? 'checked' : '' ?>>
                                                        <label class="form-check-label">ABRh-</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select class="form-select" name="Status" id="Status" aria-label="Floating label select example" >
                                            <option value="<?=$data['schedule_status']?? ''?>">
                                                <?php
                                                if($data != null)
                                                {
                                                    if($data['schedule_status'] == "E")
                                                    {
                                                        echo "Enable";
                                                    }
                                                    else if($data['schedule_status'] == "D")
                                                    {
                                                        echo "Disable";
                                                    }
                                                    else
                                                    {
                                                        echo "Cancel";
                                                    }
                                                }
                                            ?>
                                            </option>
                                            <option value="E">Enable</option>
                                            <option value="D">Disable</option>
                                            
                                            <?php if($data != null)echo '<option value="C">Cancel</option>' ?>
                                            
                                        </select>
                                        <label for="inputUsername">Status</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select class="form-select" name="Location" id="blood_type" aria-label="Floating label select example">
                                            <option value="<?=$data['location_id']??''?>">
                                            <?=$data['location_name']??''?>
                                            </option>
                                            <?php
                                                $sql = "select * from location";
                                                $result = get($sql);

                                                foreach ($result as $rows)
                                                {                                          
                                            ?>
                                            <option value="<?=$rows['location_id']?>"> <?=$rows['location_name']?> </option>
            
                                            <?php
                                                }
                                            ?>

                                        </select>
                                        <label for="inputUsername">Location</label>
                                    </div>
                                </div>
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