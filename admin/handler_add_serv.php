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

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='add_serv.php' >Добавить услугу</a>";
  
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
    if (!$_POST["title"]) $error[] = "Укажите название!";

 if (count($error))
 {
   echo implode($error);
 }else
 {
    
                  		mysql_query("INSERT INTO services(title, text)
						VALUES(	
                        '".clear_string($_POST["title"])."',
                            '".($_POST["editor1"])."'
                                                                                                                                               
						)",$link);
     echo 'true';
                   
          $_SESSION['message'] = "<p id='form-success'>Услуга успешно добавлена!</p>";
 }   
           
}    
    
    }else
{
    header("Location: login.php");
}
?>