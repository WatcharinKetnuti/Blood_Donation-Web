<?php
include '../db/db.php';

$username = $_POST['username']?? '';
$password = $_POST['password']?? '';

$sql = "select * from admin where admin_username = '$username' and admin_password = '$password' ";
$get = get($sql);

// var_dump ($sql);
//  exit();

if($get)
{
    $_SESSION['user']=$get[0];
    header('location:../screen/index.php');
}
else
{
    $_SESSION['error']="username หรือ password ผิด";
    header('location:../screen/login.php');
}


?>