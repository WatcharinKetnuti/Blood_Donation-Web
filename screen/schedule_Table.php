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
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Schedule Data</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a class="btn add-btn" href="schedule_Form.php">Add</a></li>
        </ol>

        <?php if (isset($_SESSION['message'])): ?>
            <div class='alert alert-success' role='alert'><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        
        <!-- Tabs -->
<div class="mb-4">
    <div class="btn-group" role="group" aria-label="Schedule Tabs">
        <a href="?tab=all" class="btn <?= $tab == 'all' ? 'btn-primary text-white' : 'btn-outline-primary' ?>">
            <i class="fas fa-list"></i> all
        </a>
        <a href="?tab=upcoming" class="btn <?= $tab == 'upcoming' ? 'btn-success text-white' : 'btn-outline-success' ?>">
            <i class="fas fa-calendar-plus"></i> upcoming
        </a>
        <a href="?tab=past" class="btn <?= $tab == 'past' ? 'btn-danger text-white' : 'btn-outline-danger' ?>">
            <i class="fas fa-history"></i> past
        </a>
    </div>
</div>


        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table me-1"></i>Schedule Table</div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>รหัสกำหนดการ</th>
                            <th>วันกำหนดการ</th>
                            <th>เวลากำหนดการ</th>
                            <th>กรุ๊ปเลือดที่รับ</th>
                            <th>สถานที่กำหนดการ</th>
                            <th>สถานะกำหนดการ</th>
                            <th>รายละเอียดกำหนดการ</th>
                            <th>ชื่อผู้ดูแลระบบ</th>
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
