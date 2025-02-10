<?php   
//echo phpinfo();
// $link= mysqli_connect('it.e-tech.ac.th','web22','4409','web22_resblood');

session_start();
$link = mysqli_connect('localhost','root','','blood_donation') or die('Cannot database');
date_default_timezone_set('Asia/Bangkok');
mysqli_set_charset ($link,'utf8');

function get($sql)
{
    global $link;
    $res = mysqli_query($link,$sql);
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
}

function set($sql)
{
    global $link;
    return mysqli_query($link,$sql);
    
}

// function authen()
// {
// 	return $_SESSION['user']?? false;
// }

function authen()
{
    if(!isset($_SESSION['user']))
    {
        header("Location: ../screen/login.php");
    }
}

function login_status()
{
    return $_SESSION['user']?? false;
}
function login_data($data)
{
	return $_SESSION['user'][$data]?? '';
}

// function type($data)
// {
// 	$authen= authen();
// 	return $authen[$data]?? '';
// }



?>