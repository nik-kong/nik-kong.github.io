<?php
session_start();
   include'db_connect.php';  
include'functions.php';
$id = $_POST['id_mes'];
 $result=mysql_query('SELECT * FROM messages  WHERE id_client='.$_SESSION['id_client'].' and id>'.$id.' ORDER BY id DESC'); // запрос на выборку
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{
 printf ('
                                <li class="li_mes" id="%s">',$row["id"]);
 printf ('                               <div class="chat_message">
                                <div class="comment_right">
                                <div class="comment_info" id="comment_date"><a id="comment_name" href="#">%s</a>',$row["autor"]); 
printf ('<span>|</span>%s</div>',$row["datetime"]);
printf ('     <p class="comment_p">%s<p></div>
                                <div class="clear"></div>
                                </div>
                                </li>',$row["text"]);
 
 
    
} while ($row = mysql_fetch_array($result));
} else {
    echo 1;
 }
                            ?>