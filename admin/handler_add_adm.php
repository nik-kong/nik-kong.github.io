<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
	define('myesite', true);
       
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='add_admin.php' >Добавить администратора</a>";
  
  include'db_connect.php';
    include'functions.php'; 
  mysql_query ("set_client='utf8'");
   mysql_query ("set character_set_results='utf8'");
   mysql_query ("set collation_connection='utf8_general_ci'");
   mysql_query ("SET NAMES utf8");
   header("Content-Type: text/html; charset=utf-8");

if ($_POST["submit_add"])
{
    if ($_SESSION['view_admin'] == '1')
    {

    $error = array();
    
    if ($_POST["login"])
    {
        $login = clear_string($_POST["login"]);
        $query = mysql_query("SELECT login FROM admin WHERE login='$login'",$link);
 
     If (mysql_num_rows($query) > 0)
     {
        $error[] = "Логин занят!";
     }
        
        
    }else
    {
        $error[] = "Укажите логин!";
    }
    
     
    if (!$_POST["password"]) $error[] = "Укажите пароль!";
    if (!$_POST["name"]) $error[] = "Укажите Имя!";
    if (!$_POST["email"]) $error[] = "Укажите E-mail!";

 if (count($error))
 {
   echo implode($error);
 }else
 {
    $pass   = md5(clear_string($_POST["password"]));
    $pass   = strrev($pass);
    $pass   = strtolower("mb03foo51".$pass."qj2jjdp9");
    
                  		mysql_query("INSERT INTO admin(login,password,name,email,view_admin)
						VALUES(						
                            '".clear_string($_POST["login"])."',
                            '".$pass."',
                            '".clear_string($_POST["name"])."',
                            '".clear_string($_POST["email"])."',
                            '".$_POST["view_admin"]."'
                            
                                                                                                                                                
						)",$link);
     echo 'true';
                   
          $_SESSION['message'] = "<p id='form-success'>Админ успешно добавлен!</p>";
 }   
        
    }else
    {
       $msgerror = 'У вас нет прав на добавление администраторов!'; 
    }    
}    
    
    }else
{
    header("Location: login.php");
}
?>