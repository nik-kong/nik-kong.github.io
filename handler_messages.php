<?php
session_start();
	define('myesite', true);

  include'db_connect.php';
    include'functions.php'; 
  mysql_query ("set_client='utf8'");
   mysql_query ("set character_set_results='utf8'");
   mysql_query ("set collation_connection='utf8_general_ci'");
   mysql_query ("SET NAMES utf8");
   header("Content-Type: text/html; charset=utf-8");

    $error = array();
    
    if (!$_SESSION['auth_name']) $error[] = "Зарегистрируйтесь!";
    if (!$_POST["message"]) $error[] = "Введите текст!";
    
        $id = clear_string($_SESSION['auth_id']);
        $name = clear_string($_SESSION['auth_name']);
        $message = clear_string($_POST['message']); 
        

 if (count($error))
 {
   echo implode($error);
 }else
 {
    
                  		mysql_query("INSERT INTO messages(autor,text,id_client,datetime)
						VALUES(						
                            '".$name."',
							'".$message."',
                            '".$id."',
                            NOW()	
                                                                                                                                              
						)",$link);
     echo '1';
                   
 }   
           
   
    
?>