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

  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> \ <a href='add_news.php' >Добавить новость</a>";
  
  include'db_connect.php';
    include'functions.php'; 
  mysql_query ("set_client='utf8'");
   mysql_query ("set character_set_results='utf8'");
   mysql_query ("set collation_connection='utf8_general_ci'");
   mysql_query ("SET NAMES utf8");
   header("Content-Type: text/html; charset=utf-8");
    
    }else
{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Добавление новости</title>
<meta name="author" content="">

<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300,500' rel='stylesheet' type='text/css'>

<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" id="camera-css"  href="css/slide.css" type="text/css" media="all">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/skins/tango/skin.css" />
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<script src="ckeditor/ckeditor.js"></script>



</head>
<body>
	<div class="container box_shadow"> 
	
	<?php
   include'header.php';  
    session_start(); 
        ?>	
    <section>
                	
                    	<div class="row">
                    	<div class="span2"></div>
                    	<div class="span8">
                           <br>
                        	<h2 class="title" align="left">Заполните форму</h2>
                            <div class="contact_form">  
                            	<div id="note"></div>
                                <div id="fields">
                                
                                    <form id="ajax-contact-form" method="post" align="center" action="handler_add_news.php">
                                      <p id="reg_message"></p>
                                       <div id="block-form-registration">
                                        <input class="span5" type="text" name="title" value="" placeholder="Название" />
                                        <input class="span5" type="text" name="image" value="" placeholder="Картинка" />
                                           <h5 class="h3click" >Краткое описание</h5>
                                            <div class="div-editor1" >
                                                 <textarea id="editor1" name="editor1" cols="20" rows="100"></textarea>
		                                            <script type="text/javascript">
			                                             CKEDITOR.replace( 'editor1', { width: 'auto', height: '120px' } ); 
		                                              </script>
                                            </div> 
                                        <h5 class="h3click" >Текст статьи</h5>
                                            <div class="div-editor2" >
                                                    <textarea id="editor2" name="editor2" cols="20" rows="80"></textarea>
		                                            <script type="text/javascript">
			                                             CKEDITOR.replace('editor2');   
		                                              </script>
                                             </div> 
                                        <br>
                                        <div class="clear"></div>
                                        <div align="right">
                                        <input type="reset" class="contact_btn1" value="Очистить форму" />
                                        <input type="submit" class="contact_btn1" name="submit_add" id="form_submit" value="Добавить" />
                                        </div>
                                        <div class="clear"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>                	
                	
                </section>	

	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js/camera.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script type="text/javascript" src="/js/site-script.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
   <!-- <script type="text/javascript" src="js/myscripts1.js"></script>-->
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script>
    $("#form_submit").click(function() {
    CKEDITOR.instances['editor1'].updateElement();
    CKEDITOR.instances['editor2'].updateElement();
    });
    </script>
    <script>
            $("#ajax-contact-form").validate({
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        success: function (data) {

                            if (data == 'true') {
                                $("#block-form-registration").fadeOut(300, function () {
                                    $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Новость добавлена!");
                                    $("#form_submit").hide();
                                });
                            } else {
                                $("#reg_message").addClass("reg_message_error").fadeIn(400).html(data);
                            }
                        }
                    });
                }
            });
        </script>
</body>
</html>