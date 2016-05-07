<?php
    session_start();

 if($_SERVER["REQUEST_METHOD"] == "POST")
     
{ 
 
 define('mysite', true);
 include'db_connect.php';
 include'functions.php';
     
 
     $error = array();
     
    // $id = clear_string($_GET["id"]); 
        $id = clear_string($_SESSION['id']);
        $name = iconv("UTF-8", "UTF-8",clear_string($_POST['name'])); 
        
        $message = iconv("UTF-8", "UTF-8",clear_string($_POST['message'])); 
   
     if (strlen($name) < 3 or strlen($name) > 30)
    {
       $error[] = "Имя должно быть от 3 до 15 символов!"; 
    }       
     else
         if (strlen($message) < 4)
    {
       $error[] = "Комментарий должен быть от 4 символов!"; 
    } 
    
     if (count($error))
   {
    
 echo implode('<br />',$error);
     
   }else
   {   
		
		$result = mysql_query("	INSERT INTO reviews(id_news,user_name,comment,date,moderate)
						VALUES(
						
							'".$id."',
                            '".$name."',
							'".$message."',
                            NOW(),
                            1							
						)",$link)or die("Ошибки запроса: " . mysql_error());
//header('Location: new-one.php?id='.$id.'');
// echo 'true';
         $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html'; header("Location: $redirect"); exit();
     }


}
?>