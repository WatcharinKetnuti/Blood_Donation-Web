<?php
include('../db/db.php');
api_acess();

$data = json_decode(file_get_contents("php://input"), true);
$datenow = date('Y-m-d H:i:s');
if(empty($data)) {
    echo json_encode(["success" => false, "message" => "ไม่มีข้อมูล"]);
    exit();
}

$sql = "SELECT * FROM reserve WHERE member_id = '{$data['member_id']}' AND reserve_status = 'W'";
$result = get($sql);
if($result) {
    echo json_encode(["success" => false, "message" => "มีการจองบริจาคโลหิตอยู่แล้ว"]);
    exit();
}


$sql = "SELECT * FROM reserve_detail rd 
              JOIN reserve r ON rd.reserve_id = r.reserve_id 
              WHERE rd.schedule_id = '{$data['schedule_id']}' 
              AND r.reserve_status = 'C' 
              ORDER BY rd.reserve_donation_date DESC LIMIT 1";
$last_donation = get($sql);
// if($last_donation) {
//     $last_donation_date = new DateTime($last_donation[0]['reserve_donation_date']);
//     $current_date = new DateTime();
//     $interval = $last_donation_date->diff($current_date);
//     if($interval->days < 90) {
//         echo json_encode(["success" => false, "message" => "คุณต้องรออย่างน้อย 90 วันก่อนที่จะบริจาคโลหิตอีกครั้ง"]);
//         exit();
//     }
// }


$sql = "SELECT schedule_max FROM schedule WHERE schedule_id = '{$data['schedule_id']}'";
$schedule_result = get($sql);
$schedule_max = $schedule_result[0]['schedule_max'];
$sql_count = "SELECT COUNT(*) as total FROM reserve_detail rd 
              JOIN reserve r ON rd.reserve_id = r.reserve_id 
              WHERE rd.schedule_id = '{$data['schedule_id']}' AND r.reserve_status = 'W' OR r.reserve_status = 'D'";
$count_result = get($sql_count);
$current_reservations = $count_result[0]['total'];

if($current_reservations >= $schedule_max) {
    echo json_encode(["success" => false, "message" => "การจองเต็มแล้ว"]);
    exit();
}



$ID = generate_reserve_id();
$sql = "INSERT INTO `reserve`(`reserve_id`, `reserve_date`, `reserve_status`, `member_id`) VALUES 
(
    '$ID',
    '$datenow',
    'W',
    '{$data['member_id']}'
)";

$sql2 = "INSERT INTO `reserve_detail`(`reserve_id`, `schedule_id`, `reserve_donation_date`) VALUES 
(
    '$ID',
    '{$data['schedule_id']}',
    '{$data['reserve_donation_date']}'
)";

// echo ($sql);
// echo ($sql2);
// exit();

if (set($sql) && set($sql2)) {
    echo json_encode(["success" => true, "message" => "จองบริจาคโลหิตสำเร็จ"]);
} else {
    echo json_encode(["success" => false, "message" => "เกิดข้อมผิดพลาดจากเซิฟเวอร์"]);
}





?>