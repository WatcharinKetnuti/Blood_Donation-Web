<?php
include('../db/db.php');


if(empty($_POST['id']))
{
    if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['Tel']) || empty($_POST['blood_type']) || 
    empty($_POST['birthdate']) )
    {
        $_SESSION['error']="กรุณากรอกข้อมูลให้ครบ";
        header('location:../screen/member_Form.php');
        exit();
    }

    $sql = "select * from member where member_email = '{$_POST['email']}'";
    if(get($sql))
    {
        $_SESSION['error']="มีอีเมลนี้อยู่ในระบบแล้ว";
        header('location:../screen/member_Form.php');
        exit();
    }

    $sql = "select * from member where member_tel = '{$_POST['Tel']}'";
    if(get($sql))
    {
        $_SESSION['error']="มีเบอร์โทรศัพท์นี้อยู่ในระบบแล้ว";
        header('location:../screen/member_Form.php');
        exit();
    }

}


if($_POST['id'] != null)
{
    if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['Tel']) || empty($_POST['blood_type']) || empty($_POST['birthdate']))
    {
        $_SESSION['error']="กรุณากรอกข้อมูลให้ครบ";
        header('location:../screen/member_Form.php?id='.$_POST['id']);
        exit();
    }

    $sql = "select member_email, member_tel from member where member_id != '{$_POST['id']}'";
    $result = get($sql);
    foreach($result as $row)
    {
        if($row['member_email'] == $_POST['email'])
        {
            $_SESSION['error']="มีอีเมลนี้อยู่ในระบบแล้ว";
            header('location:../screen/member_Form.php?id='.$_POST['id']);
            exit();
        }
        if($row['member_tel'] == $_POST['Tel'])
        {
            $_SESSION['error']="มีเบอร์โทรศัพท์นี้อยู่ในระบบแล้ว";
            header('location:../screen/member_Form.php?id='.$_POST['id']);
            exit();
        }
    }

}

if($_POST['password'] != null || $_POST['confirm-password'] != null)
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
    $ID = generate_member_id();

    $sql = "INSERT INTO `member`(`member_id`, `member_fname`, `member_lname`, `member_birth_date`, `member_tel`, `member_blood_type`, `member_email`, `member_password`) VALUES
    (
     '$ID',
     '{$_POST['fname']}',
     '{$_POST['lname']}',
     '{$_POST['birthdate']}',
     '{$_POST['Tel']}',
     '{$_POST['blood_type']}',
     '{$_POST['email']}',
     '{$_POST['password']}'
    )";
}
else
{
    if($_POST['password'] == null)
    {
        $sql = "UPDATE member set 
        member_fname = '{$_POST['fname']}',
        member_lname = '{$_POST['lname']}',
        member_email = '{$_POST['email']}',
        member_tel = '{$_POST['Tel']}',
        member_blood_type = '{$_POST['blood_type']}',
        member_birth_date = '{$_POST['birthdate']}'
        WHERE member_id = '{$_POST['id']}'";
    }
    else
    {
        $sql = "UPDATE member set 
        member_fname = '{$_POST['fname']}',
        member_lname = '{$_POST['lname']}', 
        member_email = '{$_POST['email']}',
        member_password = '{$_POST['password']}',
        member_tel = '{$_POST['Tel']}',
        member_blood_type = '{$_POST['blood_type']}', 
        member_birth_date = '{$_POST['birthdate']}'
        WHERE member_id = '{$_POST['id']}'";
    }
}





$set = set($sql);


// var_dump($sql);
// var_dump($set);
// exit();

if($set == true)
{
    $_SESSION['message']="Data has update complete";
    header('location:../screen/member_Table.php');
}
else
{
    $_SESSION['error']="Error from database"; 
    header('location:../screen/member_Form.php?id='.$_POST['id']);
}




?>