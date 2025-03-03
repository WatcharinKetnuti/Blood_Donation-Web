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

function api_acess()
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    //header("Content-Type: application/json");
}


function generate_member_id()
{
    $sql = "select member_id from member order by member_id desc limit 1";
    $result = get($sql);
    if($result)
    {
        $lastId = $result[0]['member_id'];
        $number = (int)substr($lastId, 3);
        $number++;
    }
    else
    {
        $number = 1;
    }
    $ID = 'mem' . str_pad($number, 7, '0', STR_PAD_LEFT);

    return $ID;
}


function generateToken($length = 32) {
    $token = random_bytes($length);
    return bin2hex($token);
}




?>