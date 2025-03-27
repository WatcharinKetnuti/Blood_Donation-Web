<?php
include('../db/db.php');
api_acess();

$data = json_decode(file_get_contents("php://input"), true);

//echo json_encode($data);

$sql = "select * from member where member_email = '{$data['member_email']}' and member_password = '{$data['member_password']}'"; 
$result = get($sql);





if($result)
{
    $token = generateToken();
    $memberData = $result + ["success" => true, "token" => $token];
    echo json_encode($memberData);
}
else
{
    echo json_encode(["success" => false]);
}


?>