<?php
include('../db/db.php');
authen();
include('../component/header.php');
include('../component/modal.php');

// ตรวจสอบ tab ที่เลือก
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'all';

// เงื่อนไข SQL ตาม tab
$condition = "";
if ($tab == 'past') {
    $condition = "WHERE schedule_end_date < CURDATE()";
} elseif ($tab == 'upcoming') {
    $condition = "WHERE schedule_end_date >= CURDATE()";
}

// ตรวจสอบมี schedule ที่หมดอายุไหม
$expired = get("SELECT COUNT(*) as expired_count FROM schedule WHERE schedule_end_date < CURDATE()");
$expired_count = $expired ? $expired[0]['expired_count'] : 0;
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Schedule Data</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a class="btn add-btn" href="schedule_Form.php">Add</a></li>
        </ol>

        <?php if ($expired_count > 0): ?>
            <div class='alert alert-warning'>
                📌 มี <?= $expired_count ?> รายการที่เลยวันที่บริจาคแล้ว!
            </div>
        <?php endif; ?>
        <!-- Tabs ที่เพิ่มมา --> 
        <div class="mb-3">
            <a class="btn <?= $tab == 'all' ? 'btn-primary' : 'btn-outline-primary' ?> me-2" href="?tab=all">all</a> <!-- ทั้งหมด --> 
            <a class="btn <?= $tab == 'upcoming' ? 'btn-success' : 'btn-outline-success' ?> me-2" href="?tab=upcoming">upcoming</a> <!-- กำลังจะถึง --> 
            <a class="btn <?= $tab == 'past' ? 'btn-danger' : 'btn-outline-danger' ?>" href="?tab=past">past</a> <!-- ที่ผ่านมา --> 
        </div>

        <!-- ตารางข้อมูล -->
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table me-1"></i>Schedule Table</div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Blood type</th>
                            <th>Detail</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Admin Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT schedule.*, location.location_name, admin.admin_username 
                                FROM schedule 
                                LEFT JOIN location ON schedule.location_id = location.location_id
                                LEFT JOIN admin ON schedule.admin_id = admin.admin_id 
                                $condition 
                                ORDER BY schedule_start_date DESC";
                        $result = get($sql);
                        if ($result !== false) {
                            foreach ($result as $row) {
                                echo "<tr>";
                                echo "<td>".$row['schedule_id']."</td>";
                                echo "<td>".date('d/m/Y', strtotime($row['schedule_start_date']))." - ".date('d/m/Y', strtotime($row['schedule_end_date']))."</td>";
                                echo "<td>".$row['schedule_start_time']." - ".$row['schedule_end_time']."</td>";
                                echo "<td>".$row['schedule_blood_type']."</td>";
                                echo "<td>".$row['location_name']."</td>";                                
                                echo "<td>".($row['schedule_status'] == "E" ? "Enable" : ($row['schedule_status'] == "D" ? "Disable" : "Cancel"))."</td>";
                                echo "<td>".$row['schedule_detail']."</td>";
                                echo "<td>".$row['admin_username']."</td>";
                                echo "<td>";
                                if ($row['admin_id'] == login_data('admin_id')) {
                                    echo "<a class='btn edit-btn btn-sm' href='schedule_Form.php?id=".$row['schedule_id']."'>Edit</a>";
                                }
                                echo "</td>";
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

<?php include('../component/footer.php'); ?>
