<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
    
{
    define('myesite', true);
	include'db_connect.php';
    include'functions.php';
    session_start(); 
    
    $login = clear_string($_POST["login"]);
    
    $pass   = md5(clear_string($_POST["password"]));
    $pass   = strrev($pass);
    $pass   = strtolower("nik2rv8q".$pass."2kong");
    

    
    if ($_POST["rememberme"] == "yes")
    {

            setcookie('rememberme',$login.'+'.$pass,time()+3600*24*31, "/");

    }
    
       
   $result = mysql_query("SELECT * FROM users WHERE (login = '$login' OR email = '$login') AND password = '$pass'",$link);
If (mysql_num_rows($result) > 0)
{
    $row = mysql_fetch_array($result);
    session_start();
    $_SESSION['auth'] = 'yes_auth'; 
    $_SESSION['auth_pass'] = $row["password"];
    $_SESSION['auth_login'] = $row["login"];
    $_SESSION['auth_surname'] = $row["surname"];
    $_SESSION['auth_name'] = $row["name"];
    $_SESSION['auth_phone'] = $row["phone"];
    $_SESSION['auth_email'] = $row["email"];
    
    echo 'yes_auth';
 
}else
{
    
    echo 'no_auth';
     
} 

} 
//$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html'; header("Location: $redirect"); exit();
?>