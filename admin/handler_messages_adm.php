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

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='dialog.php' >Диалог с клиентом</a>";
  
include'db_connect.php';
include'functions.php';             
}
  $error = array();
    
    if (!$_POST["message"]) $error[] = "Введите текст!";
    
        $id = clear_string($_SESSION['auth_id']);
        $message = clear_string($_POST['message']); 
        

 if (count($error))
 {
   echo implode($error);
     
 }else
 {
    
                  		mysql_query("INSERT INTO messages(autor,text,id_client,datetime)
						VALUES(						
                            'Администратор',
							'".$message."',
                            '".$_SESSION['id_client']."',
                            NOW()	
                                                                                                                                              
						)",$link);

     echo '1';
 }   
           
   
    
?>