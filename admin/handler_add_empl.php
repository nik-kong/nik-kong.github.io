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

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='add_admin.php' >Добавить сотрудника</a>";
  
  include'db_connect.php';
    include'functions.php'; 
  mysql_query ("set_client='utf8'");
   mysql_query ("set character_set_results='utf8'");
   mysql_query ("set collation_connection='utf8_general_ci'");
   mysql_query ("SET NAMES utf8");
   header("Content-Type: text/html; charset=utf-8");

if ($_POST["submit_add"])
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
    
                  		mysql_query("INSERT INTO employees(name, surname, patronymic, photo, post, phone, email)
						VALUES(						
                            
                            '".clear_string($_POST["name"])."',
                            '".clear_string($_POST["surname"])."',
                            '".clear_string($_POST["patronymic"])."',
                            '".clear_string($_POST["photo"])."',
                            '".clear_string($_POST["post"])."',
                            '".clear_string($_POST["phone"])."',
                            '".clear_string($_POST["email"])."'
                            
                                                                                                                                                
						)",$link);
     echo 'true';
                   
          $_SESSION['message'] = "<p id='form-success'>Сотрудник успешно добавлен!</p>";
 }   
           
}    
    
    }else
{
    header("Location: login.php");
}
?>