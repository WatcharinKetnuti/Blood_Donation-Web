<?php
include('../db/db.php'); 

$sql = "delete from admin where admin_id = '{$_GET['id']}'"; 
$set = set($sql); 

if($set == true)
{
    $_SESSION['message']="complete";
    header('location:../screen/admin_Table.php');
  
}
else
{
    $_SESSION['message']="fail";
    header('location:../screen/admin_Tables=.php');

}


?>