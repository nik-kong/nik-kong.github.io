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

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='edit_empl.php' >Изменить сотрудника</a>";
  
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

    $error = array();
    
    if (!$_POST["surname"]) $error[] = "Укажите фамилию!";
    if (!$_POST["name"]) $error[] = "Укажите имя!";
    if (!$_POST["patronymic"]) $error[] = "Укажите отчество!";
    if (!$_POST["photo"]) $error[] = "Укажите фото!"; 
    if (!$_POST["post"]) $error[] = "Укажите должность!";
    if (!$_POST["phone"]) $error[] = "Укажите телефон!";
    if (!$_POST["email"]) $error[] = "Укажите E-mail!";

 if (count($error))
 {
   echo implode($error);
 }else
 {
   $querynew = "name='{$_POST["name"]}',surname='{$_POST["surname"]}',patronymic='{$_POST["patronymic"]}',photo='{$_POST["photo"]}',post='{$_POST["post"]}',phone='{$_POST["phone"]}',email='{$_POST["email"]}'"; 
            
    $update = mysql_query("UPDATE employees SET $querynew WHERE id = '$id'",$link); 
     
     echo 'edit';
                   
          $_SESSION['message'] = "<p id='form-success'>Сотрудник изменен!</p>";
 }   
        
       
}    
    
    }else
{
    header("Location: login.php");
}
?>