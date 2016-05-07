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
    
    }else
{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Добавление администратора</title>
<meta name="author" content="">

<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300,500' rel='stylesheet' type='text/css'>

<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" id="camera-css"  href="css/slide.css" type="text/css" media="all">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/skins/tango/skin.css" />
<link href="css/bootstrap-responsive.css" rel="stylesheet">



</head>
<body>
	<div class="container box_shadow"> 
	
	<?php
   include'header.php';  
    session_start(); 
        ?>	
    <section>
                	
                    	<div class="row">
                    	<div class="span4"></div>
                    	<div class="span4">
                           <br>
                        	<h2 class="title" align="left">Заполните форму</h2>
                            <div class="contact_form">  
                            	<div id="note"></div>
                                <div id="fields">
                                
                                    <form id="ajax-contact-form" method="post" align="center" action="handler_add_empl.php">
                                      <p id="reg_message"></p>
                                       <div id="block-form-registration">
                                        <input class="span4" type="text" name="surname" value="" placeholder="Фамилия" />
                                        <input class="span4" type="text" name="name" value="" placeholder="Имя" />
                                        <input class="span4" type="text" name="patronymic" value="" placeholder="Отчество" />
                                        <input class="span4" type="text" name="photo" value="" placeholder="Фото" />
                                        <input class="span4" type="text" name="post" value="" placeholder="Должность" />
                                        <input class="span4" type="text" name="phone" value="" placeholder="Телефон" />
                                        <input class="span4" type="text" name="email" value="" placeholder="Email" />
                                        
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
            $("#ajax-contact-form").validate({
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        success: function (data) {

                            if (data == 'true') {
                                $("#block-form-registration").fadeOut(300, function () {
                                    $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Сотрудник добавлен!");
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