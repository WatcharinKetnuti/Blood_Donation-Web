<?php
include('../db/db.php');

if(empty($_POST['id']))
{
    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['adminLevel']) || empty($_POST['organization']))
    {
        $_SESSION['error']="กรุณากรอกข้อมูลให้ครบ";
        header('location:../screen/admin_Form.php');
        exit();
    }

    $sql = "select * from admin where admin_username = '{$_POST['username']}'";
    if(get($sql))
    {
        $_SESSION['error']="มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว";
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

    $sql = "select admin_username from admin where admin_id != '{$_POST['id']}'";
    $result = get($sql);
    foreach($result as $row)
    {
        if($row['admin_username'] == $_POST['username'])
        {
            $_SESSION['error']="มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว";
            header('location:../screen/admin_Form.php?id='.$_POST['id']);
            exit();
        }
    }
}

if($_POST['password'] != null || $_POST['confirm-password'] != null)
{
    if($_POST['password'] != $_POST['confirm-password'])
    {
        $_SESSION['error']="รหัสผ่านไม่ตรงกัน";
        header('location:../screen/admin_Form.php?id='.$_POST['id']);
        exit();
    }
}




// echo $ID;
// exit();





if(empty($_POST['id']))
{
    $sql = "select admin_id from admin order by admin_id desc limit 1";
    $result = get($sql);
    if($result)
    {
        $lastId = $result[0]['admin_id'];
        $number = (int)substr($lastId, 5);
        $number++;
    }
    else
    {
        $number = 1;
    }
    $ID = 'admin' . str_pad($number, 4, '0', STR_PAD_LEFT);

    $sql = "INSERT INTO `admin`(`admin_id`, `admin_username`, `admin_password`, `admin_level`, `admin_organization` ) VALUES 
    (
     '$ID',
     '{$_POST['username']}',
     '{$_POST['password']}',
     '{$_POST['adminLevel']}',
     '{$_POST['organization']}'
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
        `admin_organization`='{$_POST['organization']}'
        WHERE admin_id = '{$_POST['id']}' " ;
    }
    else
    {
        $sql = "UPDATE admin set 
        `admin_username`='{$_POST['username']}',
        `admin_password`='{$_POST['password']}',
        `admin_level`='{$_POST['adminLevel']}'
        `admin_organization`='{$_POST['organization']}'
        WHERE admin_id = '{$_POST['id']}' " ;
    }
}





$set = set($sql);


if($set == true)
{
    $_SESSION['message']="Data has update complete";
    header('location:../screen/admin_Table.php');
}
else
{
    // echo $sql;
    // exit();
    $_SESSION['error']="Error from database"; 
    header('location:../screen/admin_Form.php?id='.$_POST['id']);
}



// var_dump($sql);
// var_dump($set);
// exit();


?>