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

if (set($sql) && set($sql2)) {
    echo json_encode(["success" => true, "message" => "จองบริจาคโลหิตสำเร็จ"]);
} else {
    echo json_encode(["success" => false, "message" => "เกิดข้อมผิดพลาดจากเซิฟเวอร์"]);
}





?>