<?php
include('db.php');

if(empty($_POST['id']))
{
    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['adminLevel']))
    {
        $_SESSION['error']="กรุณากรอกข้อมูลให้ครบ";
        header('location:../screen/admin_Form.php');
        exit();
    }
}


if($_POST['id'] != null)
{
    if(empty($_POST['username']) || empty($_POST['adminLevel']))
    {
        $_SESSION['error']="กรุณากรอกข้อมูลให้ครบ";
        header('location:../screen/admin_Form.php?id='.$_POST['id']);
        exit();
    }
}

if($_POST['password'] != null && $_POST['confirm-password'] != null)
{
    if($_POST['password'] != $_POST['confirm-password'])
    {
        $_SESSION['error']="รหัสผ่านไม่ตรงกัน";
        header('location:../screen/admin_Form.php?id='.$_POST['id']);
        exit();
    }
}

if($_POST['id'] == null)
{
    $sql = "select * from admin where admin_username = '{$_POST['username']}'";
    if(get($sql))
    {
        $_SESSION['error']="มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว";
        header('location:../screen/admin_Form.php');
        exit();
    }
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
    if($_POST['password'] == null)
    {
        $sql = "UPDATE admin set 
        `admin_username`='{$_POST['username']}',
        `admin_level`='{$_POST['adminLevel']}'
        WHERE admin_id = {$_POST['id']} " ;
    }
    else
    {
        $sql = "UPDATE admin set 
        `admin_username`='{$_POST['username']}',
        `admin_password`='{$_POST['password']}',
        `admin_level`='{$_POST['adminLevel']}'
        WHERE admin_id = {$_POST['id']} " ;
    }
}





$set = set($sql);


// var_dump($sql);
// var_dump($set);
// exit();

if($set == true)
{
    $_SESSION['noti']="complete";
    header('location:../screen/admin_Tables.php');
}
else
{
    $_SESSION['error']="Error from database"; 
    header('location:../screen/admin_Form.php');
}


?>