<?php
include('../db/db.php');

if(empty($_POST['id']))
{
    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['memberLevel']))
    {
        $_SESSION['error']="กรุณากรอกข้อมูลให้ครบ";
        header('location:../screen/member_Form.php');
        exit();
    }

    $sql = "select * from member where member_username = '{$_POST['username']}'";
    if(get($sql))
    {
        $_SESSION['error']="มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว";
        header('location:../screen/member_Form.php');
        exit();
    }

}


if($_POST['id'] != null)
{
    if(empty($_POST['username']) || empty($_POST['memberLevel']))
    {
        $_SESSION['error']="กรุณากรอกข้อมูลให้ครบ";
        header('location:../screen/member_Form.php?id='.$_POST['id']);
        exit();
    }
}

if($_POST['password'] != null && $_POST['confirm-password'] != null)
{
    if($_POST['password'] != $_POST['confirm-password'])
    {
        $_SESSION['error']="รหัสผ่านไม่ตรงกัน";
        header('location:../screen/member_Form.php?id='.$_POST['id']);
        exit();
    }
}




// echo $ID;
// exit();





if(empty($_POST['id']))
{
    $sql = "select member_id from member order by member_id desc limit 1";
    $result = get($sql);
    if($result)
    {
        $lastId = $result[0]['member_id'];
        $number = (int)substr($lastId, 5);
        $number++;
    }
    else
    {
        $number = 1;
    }
    $ID = 'member' . str_pad($number, 4, '0', STR_PAD_LEFT);

    $sql = "INSERT INTO `member`(`member_id`, `member_username`, `member_password`, `member_level`) VALUES 
    (
     '$ID',
     '{$_POST['username']}',
     '{$_POST['password']}',
     '{$_POST['memberLevel']}'
    )
    ";
}
else
{
    if($_POST['password'] == null)
    {
        $sql = "UPDATE member set 
        `member_username`='{$_POST['username']}',
        `member_level`='{$_POST['memberLevel']}'
        WHERE member_id = '{$_POST['id']}' " ;
    }
    else
    {
        $sql = "UPDATE member set 
        `member_username`='{$_POST['username']}',
        `member_password`='{$_POST['password']}',
        `member_level`='{$_POST['memberLevel']}'
        WHERE member_id = '{$_POST['id']}' " ;
    }
}





$set = set($sql);


// var_dump($sql);
// var_dump($set);
// exit();

if($set == true)
{
    $_SESSION['message']="complete";
    header('location:../screen/member_Tables.php');
}
else
{
    echo $sql;
    exit();
    $_SESSION['error']="Error from database"; 
    header('location:../screen/member_Form.php');
}


?>