<?php
include('../db/db.php'); //เป็นไฟล์ db.php มาใช้ เพื่อเชื่อมฐานข้อมูล

if(empty($_POST['id'])) //เพิ่มข้อมูลใหม่ ถ้ามี id = คือ แก้ไขข้อมูลเดิม
{
    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['adminLevel']) || empty($_POST['organization']))
    {
        $_SESSION['error']="กรุณากรอกข้อมูลให้ครบ";
        header('location:../screen/admin_Form.php');
        exit(); //เช็คว่า กรอกข้อมูลครบไหม (username, password, admin level, organization) ถ้าไม่ครบจะ error และกลับไปหน้า form (admin_Form.php)
    }

    $sql = "select * from admin where admin_username = '{$_POST['username']}'";
    if(get($sql))
    {
        $_SESSION['error']="มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว";
        header('location:../screen/admin_Form.php');
        exit();
    }

}


if($_POST['id'] != null) //ถ้ามี id ส่งมา (คือ กำลัง edit)phpคัดลอกแก้ไข

{
    if(empty($_POST['username']) || empty($_POST['adminLevel'])) //เช็คว่ากรอก username กับ admin level ครบไหม
    {
        $_SESSION['error']="กรุณากรอกข้อมูลให้ครบ";
        header('location:../screen/admin_Form.php?id='.$_POST['id']);
        exit(); //ถ้าไม่ครบจะ error และกลับไปหน้า form (admin_Form.php)
    }

    $sql = "select admin_username from admin where admin_id != '{$_POST['id']}'";
    $result = get($sql);
    foreach($result as $row)
    //ดึง username ของแอดมิน คนอื่น ๆ (ที่ไม่ใช่ id นี้) 
    //มาดู ว่า username ซ้ำไหม กับที่กำลังแก้ไขอยู่
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
        //ถ้าใส่รหัสผ่าน → ต้องเช็คว่า password ตรงกับ confirm-password
        // ถ้าไม่ตรง → เซ็ต error "รหัสผ่านไม่ตรงกัน"


    }
}




// echo $ID;
// exit();



//ดึง admin_id ตัวล่าสุดจากฐานข้อมูล (เพื่อเอามานับต่อ)
//ถ้ามีข้อมูลแล้ว → เอาเลขท้ายมาต่อ +1
//ถ้ายังไม่มีข้อมูลเลย → เริ่มจาก 1
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
    //สร้างรหัส id เช่น admin0001, admin0002,
    $ID = 'admin' . str_pad($number, 4, '0', STR_PAD_LEFT);
    //สร้างคำสั่ง SQL เพิ่มแอดมินใหม่
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
//ถ้าไม่ได้กรอกรหัสผ่านใหม่ → อัปเดตแค่ username, level, organization
//ถ้าใส่ password ใหม่ → อัปเดต password ด้วย
{
    if($_POST['password'] == null)
    {
        $sql = "UPDATE admin SET 
        `admin_username` = '{$_POST['username']}',
        `admin_level` = '{$_POST['adminLevel']}',
        `admin_organization` = '{$_POST['organization']}'
        WHERE admin_id = '{$_POST['id']}'";
    }
    else
    {
        $sql = "UPDATE admin SET 
        `admin_username` = '{$_POST['username']}',
        `admin_password` = '{$_POST['password']}',
        `admin_level` = '{$_POST['adminLevel']}',
        `admin_organization` = '{$_POST['organization']}'
        WHERE admin_id = '{$_POST['id']}'";

    }
}





$set = set($sql);
//ถ้าสำเร็จ → ไปหน้าแสดงตาราง admin

//ถ้าไม่สำเร็จ → กลับไปหน้า form พร้อม error

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

//empty($_POST['id'])	เช็คว่า ไม่มีค่า หรือมีค่าเป็น "ค่าที่ว่าง" (empty value)	ถ้าเป็น "", "0", 0, null, false, [], หรือไม่ได้ส่ง id มาเลย
//$_POST['id'] != null	เช็คว่า id ไม่ใช่ null เท่านั้น	คืนค่า true ถ้า id มีค่าไม่ใช่ null (เช่น "", "0" ก็ถือว่า != null)
?>

