<?php   
//echo phpinfo();
// $link= mysqli_connect('it.e-tech.ac.th','web22','4409','web22_resblood');

session_start();
$link = mysqli_connect('localhost','root','','blood_donation') or die('Cannot database!');
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

function authen()
{
	return $_SESSION['user']?? false;
}
function type($data)
{
	$authen= authen();
	return $authen[$data]?? '';
}

function data($data)
{
	return $_SESSION['data'][$data]?? '';
}

?>