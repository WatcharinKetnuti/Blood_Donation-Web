<?php
include('../db/db.php'); //เชื่อมต่อกับฐานข้อมูล โดยรวมไฟล์ db.php ที่อยู่ในโฟลเดอร์ ../db(ภายใน db.php น่าจะมีการประกาศฟังก์ชัน set() สำหรับรัน SQL)

$sql = "delete from admin where admin_id = '{$_GET['id']}'"; //สร้างคำสั่ง SQL เพื่อ ลบข้อมูลแถว จากตาราง admin โดยเจาะจง admin_id
$set = set($sql); //เรียกใช้ฟังก์ชัน set() เพื่อ รันคำสั่ง SQL ผลลัพธ์จะเก็บไว้ในตัวแปร $set ซึ่งจะเป็น true ถ้าลบสำเร็จ และ false ถ้าลบไม่สำเร็



if($set == true)
{
    $_SESSION['message']="complete";
    header('location:../screen/admin_Table.php');
    //เก็บข้อความ "complete" ไว้ใน $_SESSION['message']
    //แล้วเปลี่ยนหน้า (redirect) ไปที่หน้าแสดงตาราง admin_Table.php
}
else
{
    $_SESSION['message']="fail";
    header('location:../screen/admin_Tables=.php');
    //เก็บข้อความ "fail" ไว้ใน $_SESSION['message']
    //แล้วเปลี่ยนหน้าไปที่ admin_Tables=.php

}


?>