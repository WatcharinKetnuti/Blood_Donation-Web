<?php
include('../db/db.php');

// var_dump($_POST);
// exit();

if(empty($_POST['StartDate']) || empty($_POST['EndDate']) || empty($_POST['StartTime']) || empty($_POST['EndTime']) || empty($_POST['detail']) || empty($_POST['blood_type']) || empty($_POST['Status']) || empty($_POST['Location']))
{ 
    $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบ";
    header('location:../screen/schedule_Form.php');
    exit();
}


$blood_types = implode(',', $_POST['blood_type']);

if(empty($_POST['id']))
{
    $sql = "SELECT schedule_id FROM schedule ORDER BY schedule_id DESC LIMIT 1";
    $result = get($sql);
    if($result)
    {
        $lastId = $result[0]['schedule_id'];
        $number = (int)substr($lastId, 3);
        $number++;
    }
    else
    {
        $number = 1;
    }
    $ID = 'sch' . str_pad($number, 6, '0', STR_PAD_LEFT);

    $sql = "INSERT INTO schedule (`schedule_id`, `schedule_start_date`, `schedule_end_date`, `schedule_start_time`, `schedule_end_time`, `schedule_detail`, `schedule_blood_type`, `schedule_status`, `location_id`,`admin_id` ) VALUES 
    (
     '$ID',
     '{$_POST['StartDate']}',
     '{$_POST['EndDate']}',
     '{$_POST['StartTime']}',
     '{$_POST['EndTime']}',
     '{$_POST['detail']}',
     '$blood_types',
     '{$_POST['Status']}',
     '{$_POST['Location']}',
     'admin0001'
    )";
}
else
{
    $sql = "UPDATE `schedule` SET 
    `schedule_start_date`='{$_POST['StartDate']}',
    `schedule_end_date`='{$_POST['EndDate']}',
    `schedule_start_time`='{$_POST['StartTime']}',
    `schedule_end_time`='{$_POST['EndTime']}',
    `schedule_detail`='{$_POST['detail']}',
    `schedule_blood_type`='$blood_types',
    `schedule_status`='{$_POST['Status']}',
    `location_id`='{$_POST['Location']}'
    WHERE schedule_id = '{$_POST['id']}'";
}

$set = set($sql);

if($set == true)
{
    $_SESSION['message'] = "Data has update complete";
    header('location:../screen/schedule_Table.php');
}
else
{
    // echo $sql;
    // exit();
    $_SESSION['error'] = "Error from database"; 
    header('location:../screen/schedule_Form.php');
}
?>
