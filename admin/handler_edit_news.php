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
    
    if (!$_POST["title"]) $error[] = "Укажите название!";
    if (!$_POST["image"]) $error[] = "Укажите картинку!";
    if (!$_POST["editor1"]) $error[] = "Укажите описание!";
    if (!$_POST["editor2"]) $error[] = "Введите текст!"; 

 if (count($error))
 {
   echo implode($error);
 }else
 {
   $querynew = "title='{$_POST["title"]}',description='{$_POST["editor1"]}',text='{$_POST["editor2"]}',image='{$_POST["image"]}'"; 
            
    $update = mysql_query("UPDATE news SET $querynew WHERE id = '$id'",$link); 
     
     echo 'true';
                   
          $_SESSION['message'] = "<p id='form-success'>Новость изменена!</p>";
 }   
        
       
}    
    
    }else
{
    header("Location: login.php");
}
?>