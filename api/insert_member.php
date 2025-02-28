<?php
include('../db/db.php');
api_acess();

$data = json_decode(file_get_contents("php://input"), true);

if(empty($data)) {
    echo json_encode(["success" => false, "message" => "ไม่มีข้อมูล"]);
    exit();
}

$sql = "select * from member where member_email = '{$data['member_email']}' ";
if(get($sql))
{
    echo json_encode(value: ["success" => false, "message" => "มีอีเมลนี้อยู่ในระบบแล้ว"]);
    exit();
}

$sql = "select * from member where member_tel = '{$data['member_tel']}' ";
if(get($sql))
{
    echo json_encode(value: ["success" => false, "message" => "มีเบอร์นี้อยู่ในระบบแล้ว"]);
    exit();
}


$ID = generate_member_id();
$sql = "INSERT INTO `member`(`member_id`, `member_fname`, `member_lname`, `member_birth_date`, `member_tel`, `member_blood_type`, `member_email`, `member_password`) VALUES
(
    '$ID',
    '{$data['member_fname']}',
    '{$data['member_lname']}',
    '{$data['member_birth_date']}',
    '{$data['member_tel']}',
    '{$data['member_blood_type']}',
    '{$data['member_email']}',
    '{$data['member_password']}'
)";


if (set($sql)) {
    echo json_encode(["success" => true, "message" => "สมัครสมาชิกสำเร็จ"]);
} else {
    echo json_encode(["success" => false, "message" => "เกิดข้อมผิดพลาดจากเซิฟเวอร์"]);
}


?>