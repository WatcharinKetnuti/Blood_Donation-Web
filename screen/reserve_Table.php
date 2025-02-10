<?php
include('../db/db.php');
authen();
include('../component/header.php');
include('../component/modal.php');

// if($_SESSION['user'] == "")
// {
// 	header("Location: login.php");
// }

?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Reserve and Donation Data</h1>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Reserve detail Table
                            </div>
                            <div class="card-body">
                                <form method="GET" action="">
                                    <div class="row mb-3">
                                        <div class="col-md-2">
                                            <label for="donation_date" class="form-label">Donation Date</label>
                                            <input type="date" class="form-control" id="donation_date" name="donation_date" value="<?php echo isset($_GET['donation_date']) ? $_GET['donation_date'] : ''; ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="location_name" class="form-label">Location</label>
                                            <select class="form-control" id="location_name" name="location_name">
                                                <option value="">All Locations</option>
                                                <?php
                                                    $location_sql = "SELECT location_name FROM location";
                                                    $locations = get($location_sql);
                                                    if($locations !== false) {
                                                        foreach($locations as $location) {
                                                            $selected = (isset($_GET['location_name']) && $_GET['location_name'] == $location['location_name']) ? 'selected' : '';
                                                            echo "<option value='".$location['location_name']."' $selected>".$location['location_name']."</option>";
                                                            
                                                        }                               
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2 align-self-end">
                                            <button type="submit" class="btn add-btn">Filter</button>
                                        </div>
                                    </div>
                                </form>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Reserve Date</th>
                                            <th>Donation Date</th>
                                            <th>Schedule date</th>
                                            <th>Location</th>
                                            <th>User</th>
                                            <th>Blood type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            $donation_date_filter = isset($_GET['donation_date']) ? $_GET['donation_date'] : '';
                                            $location_name_filter = isset($_GET['location_name']) ? $_GET['location_name'] : '';
                                            $sql = "SELECT * FROM reserve 
                                                    LEFT JOIN reserve_detail ON reserve.reserve_id = reserve_detail.reserve_id 
                                                    LEFT JOIN schedule s ON reserve_detail.schedule_id = s.schedule_id 
                                                    LEFT JOIN location ON s.location_id = location.location_id 
                                                    LEFT JOIN member ON reserve.member_id = member.member_id";
                                            $conditions = [];
                                            if ($donation_date_filter) {
                                                $conditions[] = "reserve_donation_date = '$donation_date_filter'";
                                            }
                                            if ($location_name_filter) {
                                                $conditions[] = "location_name = '$location_name_filter'";
                                            }
                                            if (count($conditions) > 0) {
                                                $sql .= " WHERE " . implode(' AND ', $conditions);
                                                //echo $sql;
                                            }
                                            $result = get($sql);
                                            if($result !== false)
                                            {
                                                foreach($result as $row)
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['reserve_id']."</td>";
                                                    echo "<td>".date('d/m/Y', strtotime($row['reserve_date']))."</td>";
                                                    echo "<td>".date('d/m/Y', strtotime($row['reserve_donation_date']))."</td>";
                                                    echo "<td>".date('d/m/Y', strtotime($row['schedule_start_date']))." - ".date('d/m/Y', strtotime($row['schedule_end_date']))."</td>";
                                                    echo "<td>".$row['location_name']."</td>";
                                                    echo "<td>".$row['member_fname']." ".$row['member_lname']."</td>";
                                                    echo "<td>".$row['member_blood_type']."</td>";
                                                    echo "<td>
                                                        <form method='POST' action='../Action/update_reserve_status.php'>
                                                            <input type='hidden' name='reserve_id' value='".$row['reserve_id']."'>
                                                            <input type='hidden' name='donation_date' value='".$donation_date_filter."'>
                                                            <input type='hidden' name='location_name' value='".$location_name_filter."'>
                                                            <input type='hidden' name='search' id='search' value=''>
                                                            <div class='form-check'>
                                                                <input class='form-check-input' type='radio' name='reserve_status' value='W' ".($row['reserve_status'] == 'W' ? 'checked' : '')." onchange='updateSearchValue(this.form)'>
                                                                <label class='form-check-label'>Waiting</label>
                                                            </div>
                                                            <div class='form-check'>
                                                                <input class='form-check-input' type='radio' name='reserve_status' value='D' ".($row['reserve_status'] == 'D' ? 'checked' : '')." onchange='updateSearchValue(this.form)'>
                                                                <label class='form-check-label'>Donated</label>
                                                            </div>
                                                            <div class='form-check'>
                                                                <input class='form-check-input' type='radio' name='reserve_status' value='C' ".($row['reserve_status'] == 'C' ? 'checked' : '')." onchange='updateSearchValue(this.form)'>
                                                                <label class='form-check-label'>Cancel</label>
                                                            </div>
                                                        </form>
                                                    </td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<script>
    function updateSearchValue(form) {
        var searchValue = document.querySelector('#datatablesSimple_filter input').value;
        form.search.value = searchValue;
        form.submit();
    }

    document.addEventListener('DOMContentLoaded', function() {
        var searchValue = "<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>";
        if (searchValue) {
            document.querySelector('#datatablesSimple_filter input').value = searchValue;
            document.querySelector('#datatablesSimple').DataTable().search(searchValue).draw();
        }
    });
</script>
<?php
include('../component/footer.php');
?>
