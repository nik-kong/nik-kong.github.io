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

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='edit_admin.php' >Изменить администратора</a>";
  
  include'db_connect.php';
  include'functions.php'; 
   mysql_query ("set_client='utf8'");
   mysql_query ("set character_set_results='utf8'");
   mysql_query ("set collation_connection='utf8_general_ci'");
   mysql_query ("SET NAMES utf8");
   header("Content-Type: text/html; charset=utf-8");
 $id = clear_string($_GET["id"]); 
if ($_POST["submit_edit"])
{
    if ($_SESSION['view_admin'] == '1')
    {

    $error = array();
    
    if (!$_POST["login"]) $error[] = "Укажите логин!";
    
    if ($_POST["password"])
    {
    $pass   = md5(clear_string($_POST["password"]));
    $pass   = strrev($pass);
    $pass   = "password='".strtolower("mb03foo51".$pass."qj2jjdp9")."',";      
    } 
    if (!$_POST["name"]) $error[] = "Укажите Имя!";
    if (!$_POST["email"]) $error[] = "Укажите E-mail!";

 if (count($error))
 {
   echo implode($error);
 }else
 {
   $querynew = "login='{$_POST["login"]}',$pass name='{$_POST["name"]}',email='{$_POST["email"]}',view_admin='{$_POST["view_admin"]}'"; 
            
    $update = mysql_query("UPDATE admin SET $querynew WHERE id = '$id'",$link); 
     
     echo 'edit';
                   
          $_SESSION['message'] = "<p id='form-success'>Админ изменен!</p>";
 }   
        
    }else
    {
       $msgerror = 'У вас нет прав на изменение администраторов!'; 
    }    
}    
    
    }else
{
    header("Location: login.php");
}
?>