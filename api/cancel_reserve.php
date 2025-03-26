<?php
include('../db/db.php');
api_acess();

$data = json_decode(file_get_contents("php://input"), true);

//echo json_encode($data);

$sql = "UPDATE reserve SET reserve_status = 'C' WHERE reserve_id = '{$data['reserve_id']}'"; 
$result = set($sql);


if($result)
{
    echo json_encode(["success" => true, "message" => "ยกเลิกการจองบริจาคโลหิตสำเร็จ"]);
}
else
{
    echo json_encode(["success" => false , "message" => "เกิดข้อผิดพลาดจากเซิฟเวอร์"]);
}


?>