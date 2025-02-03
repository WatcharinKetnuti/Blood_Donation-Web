<?php
include('db.php');

if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['adminLevel']))
{
    $_SESSION['error']="กรุณากรอกข้อมูลให้ครบ";
    header('location:../screen/register.php');
    exit();
}

if($_POST['password'] != $_POST['confirm-password'])
{
    $_SESSION['error']="รหัสผ่านไม่ตรงกัน";
    header('location:../screen/register.php');
    exit();
}

$sql = "select * from admin where admin_username = '{$_POST['username']}'";
if(get($sql))
{
    $_SESSION['error']="มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว";
    header('location:../screen/register.php');
    exit();
}


if(empty($_POST['id']))
{
    $sql = "INSERT INTO `admin`(`admin_id`, `admin_username`, `admin_password`, `admin_level`) VALUES 
    (
    Null,
     '{$_POST['username']}',
     '{$_POST['password']}',
     '{$_POST['adminLevel']}'
    )
    ";
}
else
{
    $sql = "UPDATE ReserveSchedule set 
    `reserve_date`='{$_POST['reserve_date']}',
    `end_date`='{$_POST['end_date']}',
    `start_time`='{$_POST['start_time']}',
    `end_time`='{$_POST['end_time']}',
    `location`='{$_POST['location']}',
    `res_max`='{$_POST['res_max']}',
    `status`='{$_POST['status']}'
    WHERE id = {$_POST['id']} " ;
}





$set = set($sql);


// var_dump($sql);
// var_dump($set);
// exit();

if($set == true)
{
    $_SESSION['noti']="complete";
    header('location:../screen/index.php');
}
else
{
    $_SESSION['noti']="fail";
    header('location:../screen/register.php');
}


?>