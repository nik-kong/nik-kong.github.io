<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
define('mysite', true);    
include'db_connect.php';
include'functions.php';
    session_start();

$login = clear_string($_POST['login']);

$result = mysql_query("SELECT login FROM users WHERE login = '$login'",$link);
If (mysql_num_rows($result) > 0)
{
   echo 'false';
}
else
{
   echo 'true'; 
}
}
?>