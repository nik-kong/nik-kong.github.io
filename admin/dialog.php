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
$id_client = clear_string($_GET["id_client"]);
$_SESSION['id_client'] = clear_string($_GET["id_client"]);
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
    function show() {
        var id = $("li.li_mes:first").attr("id");
        // alert(id);
        $.ajax({

            url: "mes_adm.php",
            type: "POST",
            data: {
                id_mes: id
            },
            success: function (data) {
                if (data == 1) {
                    
                } else {
                    $(".chat_pyst").remove();
                    $("ol").prepend(data);
                }
            }

        });
    }
    $(document).ready(function () {

        window.setInterval('show()', 5000);
        
        var button = $("button#form_submit");
    
        button.click(function(){
            var text = $("textarea#message").val();
            //alert(text);
                $.ajax({

            url: "handler_messages_adm.php",
            type: "POST",
            data: {message: text},
            success: function (data) {
                if (data == 1) {
                    $("textarea#message").val("");
                } else {
                    $("p#comment_message").prepend(data);
                }
            }

        });
        });
        });
</script>
</head>
<body>
	<div class="container box_shadow"> 
	 
	<?php
   include'header.php';  
    session_start(); 
        ?>
        <div class="page_container">
			<div class="wrap">
        	
			<div class="container">
               <div class="row">
                  <div class="span2"></div>
                  <div class="span8">
                      <h4 class="title" align="center">Диалог с клиентом</h4>
                      <div class="chat" id="chat">
                          <div id="comments">
                          <ol>
                                 
                                
                                   <?php
                        $result=mysql_query('SELECT * FROM messages  WHERE id_client='.$id_client.' ORDER BY id DESC'); // запрос на выборку
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{
 printf ('
                                <li class="li_mes" id="%s">',$row["id"]);
 printf ('                       <div class="chat_message">
                                <div class="comment_right">
                                <div class="comment_info" id="comment_date"><a id="comment_name" href="#">%s</a>',$row["autor"]); 
printf ('<span>|</span>%s</div>',$row["datetime"]);
printf ('     <p class="comment_p">%s<p></div>
                                <div class="clear"></div>
                                </div>
                                </li>',$row["text"]);
 
 
    
} while ($row = mysql_fetch_array($result));
} 

                            ?>   
                                <li class="li_mes" id="0">
                                <div class="chat_message" id="block">
                                <div class="comment_right">
                                <div class="comment_info" id="comment_date"><a id="comment_name" href="#">Администратор</a> 
                                </div><p class="comment_p">Здравствуйте, могу ли я вам чем-нибудь помочь?<p></div>
                                <div class="clear"></div>
                                </div>
                                </li> 
                                                                 
                                </ol>
                          </div>
                      </div>
                      <div class="comment_form">
                               <div id="ajax-contact-form" >
                               <div class="clear"></div>
                               <p id="comment_message"></p>
                                
                                <textarea name="message" id="message" class="span8" value="" placeholder="Сообщение.." ></textarea>
                               
                                   <button class="contact_btn1" id="form_submit">Добавить</button>
                                
                                <div class="clear"></div>
                            </div>
                          </div>
                          
                  </div>
                   
               </div>
                </div>
            </div>
		</div>	
    	

	</div>
    <!--<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
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
