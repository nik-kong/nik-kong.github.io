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

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='comments.php' >Сообщения от пользователей</a>";
  
include'db_connect.php';
include'functions.php';             
$id = clear_string($_GET["id"]);
$action = $_GET["action"];
$id_news = clear_string($_GET["id_news"]);

if (isset($action))
{
   switch ($action) {
        
        case 'delete':
     
      {
         $delete = mysql_query("DELETE FROM messages WHERE id = '$id'",$link);                  
      }

    break;
        
	}    
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Панель управления</title>
<meta name="author" content="">

<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300,500' rel='stylesheet' type='text/css'>

<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" id="camera-css"  href="css/slide.css" type="text/css" media="all">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/skins/tango/skin.css" />
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script> 
<script type="text/javascript">
    function confirmDelete() {
	    if (confirm("Вы подтверждаете удаление?")) {
					return true;
					}
	     else {
					return false;
	    }
	}
    </script> 

</head>
<body>
	<div class="container box_shadow"> 
	 
	<?php
   include'header.php';  
    session_start(); 
    $all_client = mysql_query("SELECT * FROM messages where autor <> 'Администратор'",$link);
    $result_count = mysql_num_rows($all_client);
        ?>	
    <div id="" class="">
      <div id="block-parameters">
<p id="count-client" >Всего сообщений - <strong><?php echo $result_count; ?></strong></p>
</div>
   
   <div id="comments">
                          <ol>
                                 <script type="text/javascript">
                                        setTimeout("window.location.reload()",60000);//Обновление раз в минуту
                                 </script>
    <?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';


	
$num = 8;

    $page = strip_tags($_GET['page']);              
    $page = mysql_real_escape_string($page);

$count = mysql_query("SELECT COUNT(*) FROM messages where autor <> 'Администратор'",$link);
$temp = mysql_fetch_array($count);
$post = $temp[0];
// Находим общее число страниц
$total = (($post - 1) / $num) + 1;
$total =  intval($total);
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная с какого номера
// следует выводить сообщения
$start = $page * $num - $num;
	
if ($temp[0] > 0)   
{ 
$result = mysql_query("SELECT * FROM messages where autor <> 'Администратор' ORDER BY id DESC LIMIT $start, $num",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{

 echo '
                                <li>
                                <div class="row">
                                <div class="span9">
                                <div class="chat_message">
                                <div class="comment_right">
                                <div class="comment_info" id="comment_date"><a id="comment_name" href="#">'.$row["autor"].'</a> 
                                <span>|</span>'.$row["datetime"].'</div><p class="comment_p">'.$row["text"].'<p></div>
                                <div class="clear"></div>
                                </div>
                                </div>
                                <div class="span3">
                            <p><a class="green_dialog" href="dialog.php?id_client='.$row["id_client"].'" >Перейти к диалогу</a></p>
                                <p><a class="delete" id="red_dialog" rel="index.php?id='.$row["id"].'&action=delete" >Удалить</a></p>
                                </div>
                                </div>
                                </li>
 
 ';   
  unset($moderate); 
} while ($row = mysql_fetch_array($result));
}   
    echo'</ol>
                          </div>';
}    
if ($page != 1) $pervpage = '<li><span><a href="index.php?page='. ($page - 1) .'" />Назад</a></span></li>';

if ($page != $total) $nextpage = '<li><span><a href="index.php?page='. ($page + 1) .'"/>Вперёд</a></span></li>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = '<li><a href="index.php?page='. ($page - 5) .'">'. ($page - 5) .'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="index.php?page='. ($page - 4) .'">'. ($page - 4) .'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="index.php?page='. ($page - 3) .'">'. ($page - 3) .'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="index.php?page='. ($page - 2) .'">'. ($page - 2) .'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="index.php?page='. ($page - 1) .'">'. ($page - 1) .'</a></li>';

if($page + 5 <= $total) $page5right = '<li><a href="index.php?page='. ($page + 5) .'">'. ($page + 5) .'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="index.php?page='. ($page + 4) .'">'. ($page + 4) .'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="index.php?page='. ($page + 3) .'">'. ($page + 3) .'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="index.php?page='. ($page + 2) .'">'. ($page + 2) .'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="index.php?page='. ($page + 1) .'">'. ($page + 1) .'</a></li>';

if ($page+5 < $total)
{
    $strtotal = '<li> ... <a href="index.php?page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = "";
}


if ($total > 1)
{
echo '
<div class="pstrnav">
    <ul>
    ';
    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='index.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
    echo '
    </ul>
    </div>
';
}
    

?>      
                  
    </div>	

	</div>
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> 
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js/camera.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script type="text/javascript" src="/js/site-script.js"></script>
    <script type="text/javascript" src="js/script.js"></script> 
    <script>
    	$.confirm = function(params){
		
		if($('#confirmOverlay').length){
			// Диалог подтверждения уже выведен на странице:
			return false;
		}
		
		var buttonHTML = '';
		$.each(params.buttons,function(name,obj){
			
			// Генерируем разметку кнопок:
			
			buttonHTML += '<a href="#" class="button '+obj['class']+'">'+name+'<span></span></a>';
			
			if(!obj.action){
				obj.action = function(){};
			}
		});
		
		var markup = [
			'<div id="confirmOverlay">',
			'<div id="confirmBox">',
			'<h1>',params.title,'</h1>',
			'<p>',params.message,'</p>',
			'<div id="confirmButtons">',
			buttonHTML,
			'</div></div></div>'
		].join('');
		
		$(markup).hide().appendTo('body').fadeIn();
		
		var buttons = $('#confirmBox .button'),
			i = 0;

		$.each(params.buttons,function(name,obj){
			buttons.eq(i++).click(function(){
				
				// Когда на кнопку нажимают, вызываем функцию действия
				// и закрываем диалог подтверждения.
				
				obj.action();
				$.confirm.hide();
				return false;
			});
		});
	}

	$.confirm.hide = function(){
		$('#confirmOverlay').fadeOut(function(){
			$(this).remove();
		});
	}
    </script>
    
</body>
</html>
