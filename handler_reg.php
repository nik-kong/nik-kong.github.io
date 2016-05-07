<?php
    session_start();
 if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
 
 define('mysite', true);
 include'db_connect.php';
 include'functions.php';
 
     $error = array();
         
        $login = iconv("UTF-8", "UTF-8",strtolower(clear_string($_POST['login']))); 
        $password = iconv("UTF-8", "UTF-8",strtolower(clear_string($_POST['password']))); 
        $surname = iconv("UTF-8", "UTF-8",clear_string($_POST['surname'])); 
        
        $name = iconv("UTF-8", "UTF-8",clear_string($_POST['name'])); 
        
        $email = iconv("UTF-8", "UTF-8",clear_string($_POST['email'])); 
        
        $phone = iconv("UTF-8", "UTF-8",clear_string($_POST['phone'])); 
 
 
    if (strlen($login) < 2 or strlen($login) > 30)
    {
       $error[] = "Логин должен быть от 5 до 15 символов!"; 
    }
   else
    {   
     $result = mysql_query("SELECT login FROM users WHERE login = '$login'",$link);
    If (mysql_num_rows($result) > 0)
    {
       $error[] = "Этот логин занят!!!";
    }
            
    }
     
    if (strlen($password) < 3 or strlen($password) > 30) $error[] = "Укажите пароль от 7 до 15 символов!";
    if (strlen($surname) < 2 or strlen($surname) > 40) $error[] = "Укажите Фамилию от 3 до 20 символов!";
    if (strlen($name) < 2 or strlen($name) > 30) $error[] = "Укажите Имя от 3 до 15 символов!";
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))) $error[] = "Укажите корректный email!";
    if (!$phone) $error[] = "Укажите номер телефона!";
    
   if (count($error))
   {
    
 echo implode('<br />',$error);
     
   }else
   {   
        $password   = md5($password); /*шифрование пароля*/
        $password   = strrev($password);
        $password   = "nik2rv8q".$password."2kong";
        
        $ip = $_SERVER['REMOTE_ADDR'];
		
		$result = mysql_query("	INSERT INTO users(login,password,name,surname,email,phone,datetime,ip)
						VALUES(
						
							'".$login."',
							'".$password."',
                            '".$name."',
							'".$surname."',
                            '".$email."',
                            '".$phone."',
                            NOW(),
                            '".$ip."'							
						)",$link)or die("Ошибки запроса: " . mysql_error());

 echo 'true';
 }        


}
?>