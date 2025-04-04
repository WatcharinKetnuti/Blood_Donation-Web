<?php
include('../db/db.php');


if(empty($_POST['name']) || empty($_POST['detail']))
{
    $_SESSION['error']="กรุณากรอกข้อมูลให้ครบ";
    header('location:../screen/location_Form.php?id='.$_POST['id']);
    exit();
}

if(empty($_POST['id']))
{
    $sql = "select * from location where location_name = '{$_POST['name']}'";
    if(get($sql))
    {
        $_SESSION['error']="มีสถานที่นี้อยู่ในระบบแล้ว";
        header('location:../screen/location_Form.php');
        exit();
    }
}

if($_POST['id'] != null)
{
    $sql = "select location_name from location where location_id != '{$_POST['id']}'";
    $result = get($sql);
    foreach($result as $row)
    {
        if($row['location_name'] == $_POST['name'])
        {
            $_SESSION['error']="มีสถานที่นี้อยู่ในระบบแล้ว";
            header('location:../screen/location_Form.php?id='.$_POST['id']);
            exit();
        }
    }
}




// echo $ID;
// exit();





if(empty($_POST['id']))
{
    $sql = "select location_id from location order by location_id desc limit 1";
    $result = get($sql);
    if($result)
    {
        $lastId = $result[0]['location_id'];
        $number = (int)substr($lastId, 3);
        $number++;
    }
    else
    {
        $number = 1;
    }
    $ID = 'loc' . str_pad($number, 6, '0', STR_PAD_LEFT);

    $sql = "INSERT INTO location (`location_id`, `location_name`, `location_detail`) VALUES 
    (
     '$ID',
     '{$_POST['name']}',
     '{$_POST['detail']}'
    )";
}
else
{
    $sql = "UPDATE `location` SET 
    `location_name`='{$_POST['name']}',
    `location_detail`='{$_POST['detail']}'
    WHERE location_id = '{$_POST['id']}'";
}

$set = set($sql);

// var_dump($sql);
// var_dump($set);
// exit();

if($set == true)
{
    $_SESSION['message']="Data has update complete";
    header('location:../screen/location_Table.php');
}
else
{
    // echo $sql;
    // exit();
    $_SESSION['error']="Error from database"; 
    header('location:../screen/location_Form.php?id='.$_POST['id']);
}





?>